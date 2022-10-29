<?php

session_start();
if (!isset($_SESSION['PRICE'])) header("location: ./");

require '../vendor/autoload.php';

include("../db/config.php");
include("../models/User.php");
include("../models/Card.php");
include("../models/UserLogin.php");
include("../models/Payment.php");
include("../models/Message.php");
include("../models/UserService.php");
include("../payments/Paystack.php");
include("../functions/index.php");
include("../utils/store.php");


$users = new User($connect);
$userServices = new UserService($connect);
$cards = new Card($connect);
$userLogins = new UserLogin($connect);
$payments = new Payment($connect);
$messages = new Message($connect);

$paystackPayment = new PaystackPayment("sk_live_67639b010ff3b1cb137d79632813db9a2ce0e789");
$id = $_SESSION['REG_NO'];
$user = $users->get_user($id);

// $stripe = new \Stripe\StripeClient('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');
$stripe = new \Stripe\StripeClient('sk_test_51KmPCVFc4Ym6vBghFwZmRYh70pdYEkQI86MX4avEP5dm19jV0VrdoQGNJwnYUTMdWrj0Wjh0H1rMXuY5O5nE4EE300NxGc4po4');

if (isset($_POST['pay'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    if ((isset($card_no) && !empty($card_no)) &&
        (isset($$card_name) && !empty($$card_name)) &&
        (isset($$card_cvv) && !empty($$card_cvv)) &&
        (isset($card_expiry) && !empty($card_expiry))
    ) {
        // Generate Card Options
        $card = [
            "userId" => $id,
            "cardNo" => $card_no,
            "cardName" => $card_name,
            "cardCVV" => $card_cvv,
            "cardExpiry" => $card_expiry,
        ];

        // Add card to database
        $result = $cards->addCard($card);
    }

    // If successful
    $url = $_SERVER['HTTP_ORIGIN'] . "/handlers/payment";
    $service = $_SESSION['SERVICE'];
    $total_price = 0;

    if ($service == "srvs-002") {
        $price = json_decode($_SESSION["PRICE"], true);
        $total_price = $price['total_price'];
    }

    if ($service == "srvs-001") {
        $price = json_decode($_SESSION["PRICE"], true);
        $total_price = $price['total'];
    }

    if ($service == "srvs-003") {
        $price = json_decode($_SESSION["PRICE"], true);
        $total_price = $price['total'];
    }

    // Make Payment
    switch ($payment_option) {
        case "paystack":
            // Initialize payment with paystack
            try {
                $details = $paystackPayment->initialize_payment($user['email'], $total_price, $url, true);

                print_r($details);
                exit;
                // Generate Payment Options
                $payment = [
                    "amount" => $total_price,
                    "userId" => $id,
                    "service" => $_SESSION['SERVICE_ID'],
                    "ref" => $details['ref']
                ];

                // Add to database
                $result = $payments->addPayment($payment);

                // Unset the id Session
                unset($_SESSION['SERVICE_ID']);

                // Redirect to paystack for payment 
                if ($result) header("Location:" . $details['pay']['data']['authorization_url']);
            } catch (Exception $e) {
                // Generate Alert Session
                $_SESSION['ALERT'] = json_encode([
                    "status" => "error",
                    "message" => "Payment was not successful"
                ]);

                header("Location:" . $_SERVER['HTTP_REFERER']);
            }

            break;

        case "stripe":
            try {
                $trx_id = $paystackPayment->generateReference();
                $data = $stripe->checkout->sessions->create([
                    'success_url' => "$url?success=$trx_id",
                    'cancel_url' => "$url?cancel=$trx_id",
                    'customer_email' => $user['email'],
                    'line_items' => [
                        [
                            'price_data' => [
                                'product_data' => [
                                    'name' => getService($connect, $service)['service'],
                                ],
                                'currency' => 'usd',
                                'unit_amount' => round($total_price * 100),
                            ],
                            'quantity' => 1,
                        ]
                    ],
                    'client_reference_id' => "$trx_id",
                    'currency' => 'USD',
                    'mode' => 'payment',
                ]);



                // Generate Payment Options
                $payment = [
                    "amount" => $total_price,
                    "userId" => $id,
                    "service" => $_SESSION['SERVICE_ID'],
                    "ref" => $trx_id
                ];

                // Add to database
                $result = $payments->addPayment($payment);

                // Unset the id Session
                unset($_SESSION['SERVICE_ID']);

                // Redirect to stripe for payment 
                if ($result)  header("Location: {$data['url']}");
            } catch (Exception $e) {
                // Generate Alert Session
                $_SESSION['ALERT'] = json_encode([
                    "status" => "error",
                    "message" => "Payment was not successful"
                ]);

                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
            break;
        default:
            break;
    }
}

if (isset($_GET["reference"])) {
    $ref = $_GET["reference"];

    // Verify Payment 
    $result = $paystackPayment->verify_transaction($ref)['status'];

    // If successful
    if ($result) {
        // Update Payments table
        $payments->updatePayment($ref, "success");

        $from = "noreply@peacerydeafrica.com";
        $to = $user['email'];

        // USERS ADMINS
        $USERS_ADMINS = fetchUsersSubAdmins($connect, $_SESSION['REG_NO']);
        $SENDERS = ["MAIN_ADMIN"];

        foreach ($USERS_ADMINS as $_admin) {
            array_push($SENDERS, $_admin['admin_id']);
        }

        if (!isset($_SESSION['LOGGED_USER'])) {
            // Generate Login Credientials
            $password = $userLogins->generatePassword();

            $file = fopen("text.txt", "a+");
            fwrite($file, $user["email"] . "\t $password \n");
            fclose($file);

            // Generate user credentials
            $newUser = [
                "email" => $user['email'],
                "password" => $password,
                "user_id" => $id
            ];

            // Add to database
            $userLogins->register($newUser);

            // Mail User
            $subject = "Registration successful";
            $message = "<div>
                            <a href='https://peacerydeafrica.com'>
                                <img src='https://peacerydeafrica.com/assets/logo.png' style='height: 80px; object-fit: contain;'
                                    alt='' />
                            </a>
                        </div>";
            $message .= "<p>Hi " . $user['firstname'] . ",</p>";
            $message .= "<p>Here's your login information </p>";
            $message .= "<p> Username / Email : <b>" . $user['email'] . "</b> <br /> Password: <b>$password</b></p>";

            $from = "noreply@peacerydeafrica.com";
            $to = $user['email'];

            // Send Login Details
            sendMail($subject, $message, $from, $to);

            // Send message to user
            $_message = "Welcome to PeaceRyde Africa. Please feel free to reach out to us if you need anything as it pertains to the service you paid for. Thank you";
            foreach ($SENDERS as $sender) {
                $messages->send_message($_SESSION['REG_NO'], $sender, $_message);
            }
        }

        // Send Reciept
        $subject = "Payment Receipt";
        $name = $user['firstname'];

        // Send Receipt
        $service = $_SESSION['SERVICE'];
        $PRICE = json_decode($_SESSION['PRICE'], true);
        $adminEmail = getSubAdmin($connect, "MAIN_ADMIN")['email'];


        if ($service == "srvs-001") {
            sendTWPReceipt($PRICE, $name, $subject, $to, $from);
        }

        if ($service == "srvs-002") {
            sendNBVReceipt($PRICE, $name, $subject, $to, $from);
        }

        if ($service == "srvs-003") {
            sendBIReceipt($PRICE, $name, $subject, $to, $from);
        }

        $_SESSION["REF"] = $ref;

        // Send Email to Admin 
        $serviceName = getService($connect, $service)['service'];
        $subject = "New Service Payment";
        $message = "<div>
                        <a href='https://peacerydeafrica.com'>
                            <img src='https://peacerydeafrica.com/assets/logo.png' style='height: 80px; object-fit: contain;'
                                alt='' />
                        </a>
                    </div>";
        $message .= "<p> <strong>$name</strong> just paid for $serviceName</p>";

        $from = "noreply@peacerydeafrica.com";
        sendMail($subject, $message, $from, $adminEmail);


        // Set Notifiication 
        setAdminNotification($connect, "./user-details?user=$id", json_encode($SENDERS), "<strong>$name</strong> just paid for $serviceName");

        // Redirect to Success Page
        header("Location: ../dashboardsuccess");
    } else {
        // Update payment table
        $payments->updatePayment($ref, "failed");

        // Generate Alert Session
        $_SESSION['ALERT'] = json_encode([
            "status" => "error",
            "message" => "Payment was not successful"
        ]);

        // Redirect to Index Page with alert
        header("Location: ../");
    }
}

if (isset($_GET["cancel"])) {
    $ref = $_GET["cancel"];
    // Update payment table
    $payments->updatePayment($ref, "failed");

    // Generate Alert Session
    $_SESSION['ALERT'] = json_encode([
        "status" => "error",
        "message" => "Payment was not successful"
    ]);

    // Redirect to Index Page with alert
    header("Location: ../");
}

if (isset($_GET["success"])) {
    $ref = $_GET["success"];
    // Update Payments table
    $payments->updatePayment($ref, "success");

    $from = "noreply@peacerydeafrica.com";
    $to = $user['email'];

    // USERS ADMINS
    $USERS_ADMINS = getAdminWithSameCountryAsUser($connect, $_SESSION['REG_NO']);
    $SENDERS = ["MAIN_ADMIN"];

    foreach ($USERS_ADMINS as $_admin) {
        array_push($SENDERS, $_admin['admin_id']);
    }

    if (!isset($_SESSION['LOGGED_USER'])) {
        // Generate Login Credientials
        $password = $userLogins->generatePassword();

        $file = fopen("text.txt", "a+");
        fwrite($file, $user["email"] . "\t $password \n");
        fclose($file);

        // Generate user credentials
        $newUser = [
            "email" => $user['email'],
            "password" => $password,
            "user_id" => $id
        ];

        // Add to database
        $userLogins->register($newUser);

        // Mail User
        $subject = "Registration successful";
        $message = "<div>
                        <a href='https://peacerydeafrica.com'>
                            <img src='https://peacerydeafrica.com/assets/logo.png' style='height: 80px; object-fit: contain;'
                                alt='' />
                        </a>
                    </div>";
        $message .= "<p>Hi " . $user['firstname'] . ",</p>";
        $message .= "<p>Here's your login information </p>";
        $message .= "<p> Username / Email : <b>" . $user['email'] . "</b> <br /> Password: <b>$password</b></p>";

        $from = "noreply@peacerydeafrica.com";
        $to = $user['email'];

        // Send Login Details
        sendMail($subject, $message, $from, $to);

        // Send message to user
        $_message = "Welcome to PeaceRyde Africa. Please feel free to reach out to us if you need anything as it pertains to the service you paid for. Thank you";
        foreach ($SENDERS as $sender) {
            $messages->send_message($_SESSION['REG_NO'], $sender, $_message);
        }
    }

    // Send Reciept
    $subject = "Payment Receipt";
    $name = $user['firstname'];

    // Send Receipt
    $service = $_SESSION['SERVICE'];
    $PRICE = json_decode($_SESSION['PRICE'], true);
    $adminEmail = getSubAdmin($connect, "MAIN_ADMIN")['email'];


    if ($service == "srvs-001") {
        sendTWPReceipt($PRICE, $name, $subject, $to, $from);
    }

    if ($service == "srvs-002") {
        sendNBVReceipt($PRICE, $name, $subject, $to, $from);
    }

    if ($service == "srvs-003") {
        sendBIReceipt($PRICE, $name, $subject, $to, $from);
    }

    $_SESSION["REF"] = $ref;

    // Send Email to Admin 
    $serviceName = getService($connect, $service)['service'];
    $subject = "New Service Payment";
    $message = "<div>
                    <a href='https://peacerydeafrica.com'>
                        <img src='https://peacerydeafrica.com/assets/logo.png' style='height: 80px; object-fit: contain;'
                            alt='' />
                    </a>
                </div>";
    $message .= "<p> <strong>$name</strong> just paid for $serviceName</p>";

    $from = "noreply@peacerydeafrica.com";
    sendMail($subject, $message, $from, $adminEmail);


    // Set Notifiication 
    setAdminNotification($connect, "./user-details?user=$id", json_encode($SENDERS), "<strong>$name</strong> just paid for $serviceName");

    // Redirect to Success Page
    header("Location: ../dashboardsuccess");
}

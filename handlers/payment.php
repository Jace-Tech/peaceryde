<?php 

session_start();
if(!isset($_SESSION['PRICE'])) header("location: ./index.php");

include("../db/config.php");
include("../models/User.php");
include("../models/Card.php");
include("../models/UserLogin.php");
include("../models/Payment.php");
include("../models/UserService.php");
include ("../payment/Paystack.php");
include("../functions/index.php");


$users = new User($connect);
$userServices = new UserService($connect);
$cards = new Card($connect);
$userLogins = new UserLogin($connect);
$payments = new Payment($connect);

$paystackPayment = new PaystackPayment("sk_test_93c9b32d64e89a668f17a1f7a2376a35aaaaeff1");
$id = $_SESSION['REG_NO'];
$user = $users->get_user($id);


if(isset($_POST['pay'])){
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

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
    
    // If successful
    if($result) {
        $url = $_SERVER['HTTP_ORIGIN'] . "/app/handlers/payment.php";
        $service = $userServices->getService($id)['service_id'];
        $total_price = 0;

        if($service == "srvs-002") {    
            $price = json_decode($_SESSION["PRICE"], true);
            $total_price = $price['total_price'];
        }

        if($service == "srvs-001") {
            $price = json_decode($_SESSION["PRICE"], true);
            $total_price = $price['total'];
        }

        if($service == "srvs-003") {
            $price = json_decode($_SESSION["PRICE"], true);
            $total_price = $price['total'];
        }

        // Make Payment
        switch($payment_option) {
            case "paystack":
                // Initialize payment with paystack
                $details = $paystackPayment->initialize_payment($user['email'], $total_price, $url);

                // Generate Payment Options
                $payment = [
                    "amount" => $total_price,
                    "userId" => $id,
                    "service" => $service,
                    "ref" => $details['ref']
                ];

                // Add to database
                $result = $payments->addPayment($payment);

                // Redirect to paystack for payment 
                if($result) header("Location:" . $details['pay']['data']['authorization_url']);
                break;
    
            default:
                break;
        }
    }

}


if(isset($_GET["reference"])) {
    $ref = $_GET["reference"];

    // Verify Payment 
    $result = $paystackPayment->verify_transaction($ref)['status'];

    // If successful
    if($result) {
        // Update Payments table
        $payments->updatePayment($ref, "success");

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
        $result = $userLogins->register($newUser);

        // If successful
        if($result) {
            // Mail User
            $subject = "Registration successful";

            $message = "<p>Hi ". $user['firstname'] . ",</p>";
            $message .= "<p>Here's your login information </p>";
            $message .= "<p> Username / Email : <b>" . $user['email'] . "</b> <br /> Password: <b>$password</b></p>";

            $from = "billing@peacerydeafrica.com";
            $to = $user['email'];

            sendMail($subject, $message, $from, $to);

            $_SESSION["REF"] = $ref;

            // Redirect to Success Page
            header("Location: ../success.php");
        }

    }
    else {
        // Update payment table
        $payments->updatePayment($ref, "failed");

        // Generate Alert Session
        $_SESSION['ALERT'] = json_encode([
            "status" => "error",
            "message" => "Payment was not successful"
        ]);

        // Redirect to Index Page with alert
        header("Location: ../index.php");
    }

}
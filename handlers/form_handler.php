<?php 
session_start();
// require_once('../vendor/autoload.php');
// $stripe = new \Stripe\StripeClient('sk_test_51KmPCVFc4Ym6vBghFwZmRYh70pdYEkQI86MX4avEP5dm19jV0VrdoQGNJwnYUTMdWrj0Wjh0H1rMXuY5O5nE4EE300NxGc4po4');


include("../db/config.php");
include("../models/User.php");
include("../models/BI.php");
include("../utils/country_fee.php");
include("../functions/index.php");
include("../utils/store.php");

$users = new User($connect);
$bis = new BI($connect);

if(isset($_POST['twp'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    // Generate users option
    $user = [
        "firstname" => $firstname,
        "title" => $title,
        "email" => $email,
        "lastname" => $lastname,
        "gender" => $gender,
        "middle_name" => $middlename,
        "dob" => $dob,
        "country" => $country,
        "serviceId" => $service,
        "passport" => $passport,
        "phone" => "+". $countryCode . $phone
    ];


    if(isset($_SESSION['LOGGED_USER'])) {
        $LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
        $serviceResult = $users->add_user_service($LOGGED_USER['user_id'], $service);

        // Generate a session with user ID
        $_SESSION['REG_NO'] = $LOGGED_USER['user_id'];
        $_SESSION["SERVICE_ID"] = $serviceResult['id']; 

    }
    else {
        // Check if user exists 
        $query = "SELECT * FROM users WHERE email = ?";
        $checkResult = $connect->prepare($query);
        $checkResult->execute([$email]);

        if($checkResult->rowCount()) {
            setUserAlert("User account already exist", "error", "Please login or do a password reset");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result['userId'];
        $_SESSION["SERVICE_ID"] = $result['id']; 

        // Set Notification
        $USERS_ADMINS = getAdminWithSameCountryAsUser($connect, $result['userId']); 
        $SENDERS = ["MAIN_ADMIN"];

        foreach ($USERS_ADMINS as $_admin) {
            array_push($SENDERS, $_admin['admin_id']);
        }

        foreach ($SENDERS as $sender) {
            sendMail("New User", "<p>A new user <strong>$firstname</strong> was added</p>", "noreply@peacerydeafrica.com", $sender['email'], true);
        }

        setAdminNotification($connect, "./user-details?user=" . $result['userId'], json_encode($SENDERS), "A new user was added, click to view"); 
    }

    // Get TWP Calculations
    $fees = get_twp();
    $_SESSION["PRICE"] = json_encode($fees);
    $_SESSION['SERVICE'] = $service;

    // Redirect to payment page
    header('Location: ../payment');
    
}

if(isset($_POST['nbv'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    // Generate users option
    $user = [
        "firstname" => $firstname,
        "title" => $title,
        "email" => $email,
        "lastname" => $lastname,
        "gender" => $gender,
        "middle_name" => $middlename,
        "dob" => $dob,
        "country" => $country,
        "serviceId" => $service,
        "passport" => $passport,
        "phone" => "+". $countryCode . $phone
    ];


    if(isset($_SESSION['LOGGED_USER'])) {
        $LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
        $serviceResult = $users->add_user_service($LOGGED_USER['user_id'], $service);

        // Generate a session with user ID
        $_SESSION['REG_NO'] = $LOGGED_USER['user_id'];
        $_SESSION["SERVICE_ID"] = $serviceResult['id']; 
    }
    else {
        // Check if user exists 
        $query = "SELECT * FROM users WHERE email = ?";
        $checkResult = $connect->prepare($query);
        $checkResult->execute([$email]);

        if($checkResult->rowCount()) {
            setUserAlert("User account already exist", "error", "Please login or do a password reset");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result['userId'];
        $_SESSION["SERVICE_ID"] = $result['id']; 

         // Set Notification
         $USERS_ADMINS = getAdminWithSameCountryAsUser($connect, $result['userId']); 
         $SENDERS = ["MAIN_ADMIN"];
 
         foreach ($USERS_ADMINS as $_admin) {
             array_push($SENDERS, $_admin['admin_id']);
         }
         
         foreach ($SENDERS as $sender) {
             sendMail("New User", "<p>A new user <strong>$firstname</strong> was added</p>", "noreply@peacerydeafrica.com", $sender['email'], true);
         }
 
         setAdminNotification($connect, "./user-details?user=" . $result['userId'], json_encode($SENDERS), "A new user was added, click to view"); 
    }
    
    // Get TWP Calculations
    $fees = get_total_price($country);
    $_SESSION["PRICE"] = json_encode($fees);
    $_SESSION['SERVICE'] = $service;

    // Redirect to payment page
    header('Location: ../payment');
    
}

if(isset($_POST['bi'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    // Generate users option
    $user = [
        "firstname" => $firstname,
        "title" => $title,
        "email" => $email,
        "dob" => $dob,
        "lastname" => $lastname,
        "phone" => "+". $countryCode . $phone,
        "serviceId" => $service,
        "gender" => $gender,
        "country" => $country,
        "middle_name" => $middlename,
    ];


    if(isset($_SESSION['LOGGED_USER'])) {
        $LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
        $serviceResult = $users->add_user_service($LOGGED_USER['user_id'], $service);

        // Generate a session with user ID
        $_SESSION['REG_NO'] = $LOGGED_USER['user_id'];
        $_SESSION['SERVICE_ID'] = $serviceResult['id'];

        $bi_options = [
            'userId' => $LOGGED_USER['user_id'], 
            'shares' => $shares,
            'email' => $email,
            'companyName' => $companyName,
            'coperateAddress' => $coperateAddress,
        ];
        

        $bis->addBI($bi_options);
    }
    else {
        // Check if user exists 
        $query = "SELECT * FROM users WHERE email = ?";
        $checkResult = $connect->prepare($query);
        $checkResult->execute([$email]);

        if($checkResult->rowCount()) {
            setUserAlert("User account already exist", "error", "Please login or do a password reset");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
        
        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result['userId'];
        $_SESSION["SERVICE_ID"] = $result['id']; 

        $bi_options = [
            'userId' => $result['userId'], 
            'shares' => $shares,
            'email' => $email,
            'companyName' => $companyName,
            'coperateAddress' => $coperateAddress,
        ];


        // Set Notification
        $USERS_ADMINS = getAdminWithSameCountryAsUser($connect, $result['userId']); 
        $SENDERS = ["MAIN_ADMIN"];

        foreach ($USERS_ADMINS as $_admin) {
            array_push($SENDERS, $_admin['admin_id']);
        }
        
        foreach ($SENDERS as $sender) {
            sendMail("New User", "<p>A new user <strong>$firstname</strong> was added</p>", "noreply@peacerydeafrica.com", $sender['email'], true);
        }

        setAdminNotification($connect, "./user-details?user=" . $result['userId'], json_encode($SENDERS), "A new user was added, click to view"); 
    }

    // Get BI Calculations
    $fees = get_bi_price($shares);
    $_SESSION["PRICE"] = json_encode($fees);
    $_SESSION['SERVICE'] = $service;

    // Redirect to payment page
    header('Location: ../payment');
    
}
<?php 
session_start();

include("../db/config.php");
include("../models/User.php");
include("../models/BI.php");
include("../utils/country_fee.php");

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
        "phone" => $country_code . $phone
    ];

    if(isset($_SESSION['LOGGED_USER'])) {
        $LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
        $users->add_user_service($LOGGED_USER['user_id'], $service);

        // Generate a session with user ID
        $_SESSION['REG_NO'] = $LOGGED_USER['user_id'];
    }
    else {
        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result;
    }

    // Get TWP Calculations
    $fees = get_twp($country);
    $_SESSION["PRICE"] = json_encode($fees);

    // Redirect to payment page
    header('Location: ../payment.php');
    
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
        "phone" => $country_code . $phone
    ];


    if(isset($_SESSION['LOGGED_USER'])) {
        $LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
        $users->add_user_service($LOGGED_USER['user_id'], $service);

        // Generate a session with user ID
        $_SESSION['REG_NO'] = $LOGGED_USER['user_id'];
    }
    else {
        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result;
    }
    
    // Get TWP Calculations
    $fees = get_total_price($country);
    $_SESSION["PRICE"] = json_encode($fees);

    // Redirect to payment page
    header('Location: ../payment.php');
    
}

if(isset($_POST['bi'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    // Generate users option
    $user = [
        "email" => $email,
        "serviceId" => $service,
    ];


    if(isset($_SESSION['LOGGED_USER'])) {
        $LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
        $users->add_user_service($LOGGED_USER['user_id'], $service);

        // Generate a session with user ID
        $_SESSION['REG_NO'] = $LOGGED_USER['user_id'];

        $bi_options = [
            'userId' => $LOGGED_USER['user_id'], 
            'shares' => $shares,
            'email' => $email,
            'companyName' => $companyName,
            'coperateAddress' => $coperateAddress
        ];

        $bis->addBI($bi_options);
    }
    else {
        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result;

        $bi_options = [
            'userId' => $result, 
            'shares' => $shares,
            'email' => $email,
            'companyName' => $companyName,
            'coperateAddress' => $coperateAddress
        ];

        $bis->addBI($bi_options);
    }

    // Get TWP Calculations
    $fees = get_bi_price($shares);
    $_SESSION["PRICE"] = json_encode($fees);

    // Redirect to payment page
    header('Location: ../payment.php');
    
}
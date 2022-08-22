<?php 
session_start();

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
            setUserAlert("Email already exists", "error");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result['userId'];
        $_SESSION["SERVICE_ID"] = $result['id']; 

        $admin = getSubAdmin($connect, "MAIN_ADMIN");

        setAdminNotification($connect, "./user-details?user=" . $result['userId'], json_encode(["MAIN_ADMIN"]), "A new user was added, click to view"); 
        sendMail("New User", "<p>A new user <strong>$firstname</strong> was added</p>", "noreply@peacerydeafrica.com", $admin['email'], true);
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
            setUserAlert("Email already exists", "error");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $result = $users->add_new_user($user);
        // Generate a session with user ID
        $_SESSION['REG_NO'] = $result['userId'];
        $_SESSION["SERVICE_ID"] = $result['id']; 

        $admin = getSubAdmin($connect, "MAIN_ADMIN");

        setAdminNotification($connect, "./user-details.php?user=" . $result['userId'], json_encode(["MAIN_ADMIN"]), "A new user was added, click to view"); 
        sendMail("New User", "<p>A new user <strong>$firstname</strong> was added</p>", "noreply@peacerydeafrica.com", $admin['email'], true);
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
        "email" => $email,
        "dob" => $dob ?? NULL,
        "lastname" => $lastname,
        "phone" => "+". $countryCode . $phone,
        "serviceId" => $service,
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
            setUserAlert("Email already exists", "error");
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


        $admin = getSubAdmin($connect, "MAIN_ADMIN");

        setAdminNotification($connect, "./user-details.php?user=" . $result['userId'], json_encode(["MAIN_ADMIN"]), "A new user was added, click to view"); 
        sendMail("New User", "<p>A new user <strong>$firstname</strong> was added</p>", "noreply@peacerydeafrica.com", $admin['email'], true);

        $bis->addBI($bi_options);
    }

    // Get BI Calculations
    $fees = get_bi_price($shares);
    $_SESSION["PRICE"] = json_encode($fees);
    $_SESSION['SERVICE'] = $service;

    // Redirect to payment page
    header('Location: ../payment');
    
}
<?php 
session_start();

include("../db/config.php");
include("../models/UserLogin.php");

$userLogins = new UserLogin($connect);

if(isset($_POST["login"])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
    
    $result = $userLogins->login($email, $password);

    if(!$result) {
        $alert = [
            "status" => "error",
            "message" => "Invalid login credentials"
        ];

        $_SESSION["alert"] = json_encode($alert);
        header("Location: ../index.php");
    }
    else {
        $alert = [
            "status" => "success",
            "message" => "Logged In successfully"
        ];
        $_SESSION["alert"] = json_encode($alert);

        $data = [
            "email" => $result["email"],
            "user_id" => $result["user_id"],
        ];

        $_SESSION['LOGGED_USER'] = json_encode($data);
        header("Location: ../Dashboard/index.php");
    }
}
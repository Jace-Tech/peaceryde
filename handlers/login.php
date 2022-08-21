<?php 
session_start();

require_once("../db/config.php");
// require_once("../db/conf.php");
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

        $_SESSION["ALERT"] = json_encode($alert);
        if(isset($_POST["redirect"])) {
            header("Location: $redirect");
        }
        else {
            header("Location: ../signin");
        }
    }
    else {
        $alert = [
            "status" => "success",
            "message" => "Logged In successfully"
        ];
        $_SESSION["ALERT"] = json_encode($alert);

        $data = [
            "email" => $result["email"],
            "user_id" => $result["user_id"],
        ];

        $_SESSION['LOGGED_USER'] = json_encode($data);
        header("Location: ../Dashboard/");
    }
}
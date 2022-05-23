<?php 

include("../../db/config.php");
include("../../functions/index.php");
include("../../models/ResetPassword.php");


$reset_password = new ResetPassword($connect);

if(isset($_POST['reset'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $query =  "SELECT * FROM `admin` WHERE `email` = ?";
    $result = $connect->prepare($query);
    $result->execute([$email]);

    if($result->rowCount()) {
        $response = $reset_password->initializeReset($email);
        
        $time = strtotime("10 mins");
        setcookie("RESET", $response['reset_id'], $time, '/');
         
        // send mail
        $from = "alexjace151@gmail.com";
        $subject = "Password Reset";
        $message = "Hi {$email}, <br> your reset pin is <strong>${$response['pin']}</strong>";
        $to = $email;

        sendMail($subject, $message, $from, $to);

        // Generate a file
        $file_handler = fopen("pin.txt", "a+");
        fwrite($file_handler, "{$response['pin']} \n");
        fclose($file_handler);

        $alert = [
            "alert_type" => "success",
            "alert_message" => "Message sent to your inbox",
        ];

        session_start();
        $_SESSION['alert'] = json_encode($alert);

        header("location: ../verify.php");


    }
    else {
        $alert = [
            "alert_type" => "success",
            "alert_message" => "Email doesn't exist",
        ];

        session_start();
        $_SESSION['alert'] = json_encode($alert);

        header("Location: ../reset-password.php");
    }
    
}

if(isset($_POST['verify'])){
    $pin = filter_field($_POST['pin']);
    $id = $_COOKIE['RESET'];
    
    if($reset_password->verifyPin($id, $pin)){
        header("location: ../change-password.php");
    }
}

if(isset($_POST['change'])) {
    $password = $_POST['password'];
    $id = $_COOKIE['RESET'];

    $result = $reset_password->changePassword($id, $password);

    if($result) {

        $deleted = $reset_password->deleteReset($id);
        
        if($deleted) {
            
            // destroy cookie
            $time = time() - strtotime("1hr");
            setcookie("RESET", "destroy", $time, '/');
    
            $alert = [
                "alert_type" => "success",
                "alert_message" => "Password Changed"
            ];
    
            session_start();
            $_SESSION["alert"] = json_encode($alert);
            
            header("Location: ../index.php");
        }
    }
}
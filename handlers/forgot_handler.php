<?php 

session_start();

include("../db/config.php");
include("../functions/index.php");
include("../models/ResetUserPassword.php");
include("../models/ResetPassword.php");
include("../models/User.php");
include("../setup.php");

$resetPassword = new ResetUserPassword($connect);
$resetMainPassword = new ResetPassword($connect);
$users = new User($connect);



if(isset($_POST['reset'])){
    $email = trim($_POST['email']);

    // Check if user exists
    if(!$users->get_user_by_email($email)){
        $alert = [
            "status" => "error",
            "message" => "User does not exist"
        ];
        $_SESSION['ALERT'] = json_encode($alert);
        header("Location: ../forgotpass");
        exit();
    }

    $result = $resetMainPassword->initializeReset($email);

    if($result) {
        $pin = $result['pin'];

        // Send mail
        $subject = "Password Reset";
        $message = "<p>Your pin is <strong>$pin</strong></p>";
        sendMail($subject, $message, FROM, $email);

        $_SESSION['RESET_ID'] = $result['reset_id'];

        // set session 
        $_SESSION['ALERT'] = json_encode([
            "message" => "Check your mail for pin",
            "status" => "info"
        ]);

        header("Location: ../forgotpass?verify");

    }
    else {
        $_SESSION['ALERT'] = json_encode([
            "message" => "something went wrong",
            "status" => "error"
        ]);
        header("Location: ../forgotpass?verify");

    }

}

if(isset($_POST['verify'])) {
    $pin = $_POST['pin'];
    $RESET_ID = $_SESSION['RESET_ID'];

    $result = $resetMainPassword->verifyPin($RESET_ID, $pin);
    if($result) {
        header('Location: ../resetpass');
    }
    else {
        $_SESSION['ALERT'] = json_encode([
            "message" => "Incorrect Pin",
            "status" => "error"
        ]);

        header("Location: ../forgotpass?verify");
    }
}

if(isset($_POST['change'])) {
    $password = md5($_POST['password']);
    $RESET_ID = $_SESSION['RESET_ID'];

    $result = $resetMainPassword->getResetInfo($RESET_ID);

    if($result) {
        $email = $result['email'];
        $result = $resetPassword->changePassword($email, $password);

        if($result) {
            $_SESSION['ALERT'] = json_encode([
                'message' => 'Password changed successfully',
                'status' => 'success',
            ]);

            unset($_SESSION['RESET_PIN']);

            header("Location: ../signin");
        }
        else {
            $_SESSION['ALERT'] = json_encode([
                "message" => "something went wrong",
                "status" => "error"
            ]);

            header("Location: ../resetpass");
        }
    }
    else {
        $_SESSION['ALERT'] = json_encode([
            "message" => "something went wrong",
            "status" => "error"
        ]);

        header("Location: ../resetpass");
    }

}
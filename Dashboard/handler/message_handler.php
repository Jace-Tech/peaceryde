<?php  

session_start();

include("../../db/config.php");
include("../../models/Message.php");

$messages = new Message($connect);

if(isset($_POST['send'])) {
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $result = $messages->send_message($_POST['reciever'], $_POST['sender'], $message);
    if($result) {
        $alert = [
            'message' => "Message sent successfully",
            'status' => 'success'
        ];
        $_SESSION['ALERT'] = json_encode($alert);

        header("Location: ../index.php");
    }
    else {
        $alert = [
            'message' => "Something went wrong, please try again.",
            'status' => 'error'
        ];
        $_SESSION['ALERT'] = json_encode($alert);

        header("Location: ../index.php");
    }
}
else {
    header("Location: ../index.php");
}
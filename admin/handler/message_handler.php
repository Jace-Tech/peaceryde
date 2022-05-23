<?php 

require("../addons/crsf_auth.php");
require_once("../../models/Message.php");
require_once("../../models/User.php");
require_once("../../functions/index.php");
require_once("../../db/config.php");

$messages = new Message($connect);
$user = new User($connect);

if(isset($_POST['send'])){
    $message = filter_field($_POST['message']);
    $sender = $_POST['sender'];
    $reciever = $_POST['reciever'];

    $result = $messages->send_message($reciever, $sender, $message);

    if($result){
        header("Location: ../message.php?msg=$reciever");
    }
    else{
        session_start();
        $alert = [
            'alert_message' => "Something went wrong",
            'alert_type' => 'error'
        ];

        $_SESSION['alert'] = json_encode($alert);
        header("Location: ../message.php");
    }

}

if (isset($_POST['broadcast'])) {
    $all_users = $user->get_all_users();
    $message = filter_field($_POST['message']);
    $sender = $_POST['sender'];

    $final_result = false;

    foreach($all_users as $user) {
        extract($user);

        $result = $messages->send_message($user_id, $sender, $message);
        if($result) $final_result = true;
        else $final_result = false;
    }

    if($final_result){
        session_start();

        $alert = [
            'alert_message' => "Message Broadcasted!",
            'alert_type' => 'success'
        ];

        $_SESSION['alert'] = json_encode($alert);
        header("Location: ../message.php");
    }
}
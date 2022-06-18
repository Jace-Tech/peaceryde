<?php 

require_once("./models.php");

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
        setAdminAlert("Something went wrong", 'error');
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
        setAdminAlert("Message Broadcasted!", 'success');
        header("Location: ../message.php");
    }
}
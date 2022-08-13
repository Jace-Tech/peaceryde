<?php 

require_once("./models.php");

$messages = new Message($connect);
$user = new User($connect);

if(isset($_POST['send'])){
    $message = filter_field($_POST['message']);
    $sender = $_POST['sender'];
    $reciever = $_POST['reciever'];

    // ATTACHMENT
    $files = $_FILES['attachment'];

    if($files['error']) {
        // send normal message
        $result = $messages->send_message($reciever, $sender, $message);
    }
    else {
        $attachments = [];
        // Upload the attachment
        for($num = 0; $num < count($files['name']); $num++) {
            $filearray = explode(".", $files['name'][$num]);
            $filename = $filearray[0];
            $extension = end($filearray);

            // Max file size for
            $size = $files['size'][$num];
            $MAX_FILE_SIZE = 2 * 1024 * 1024;

            // Check for file size
            if($size > $MAX_FILE_SIZE) {
                setAdminAlert("File too large", "error");
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();
            }

            $time = time();
            $newFilename = "$filename-$time.$extension";

            $tempFile = $files['tmp_name'][$num];
            $destination = "../../attachment/$newFilename";

            if(move_uploaded_file($tempFile, $destination)) {
                array_push($attachments, $newFilename);
            }
        }

        $result = $messages->send_message($reciever, $sender, $message, json_encode($attachments));
    }


    if($result){
        header("Location: ../view_message.php?msg=$reciever");
    }
    else{
        setAdminAlert("Something went wrong", 'error');
        header("Location: ../view_message.php");
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
        header("Location: ../view_message.php");
    }
}
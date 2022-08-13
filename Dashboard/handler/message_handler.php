<?php  

session_start();

include("../../db/config.php");
// include("../../db/conf.php");
include("../../models/Message.php");

$messages = new Message($connect);

if(isset($_POST['send'])) {
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $files = $_FILES['attachments'];

    if($files['error'][0]) {
        $result = $messages->send_message($_POST['reciever'], $_POST['sender'], $message);
    }
    else {
        $attachments = [];
        // Upload the attachment
        for ($num = 0; $num < count($files['name']); $num++) {
            $filearray = explode(".", $files['name'][$num]);
            $filename = $filearray[0];
            $extension = end($filearray);

            // Max file size for
            $size = $files['size'][$num];
            $MAX_FILE_SIZE = 2 * 1024 * 1024;

            // Check for file size
            if ($size > $MAX_FILE_SIZE) {
                setAdminAlert("File too large", "error");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $time = time();
            $newFilename = "$filename-$time.$extension";

            $tempFile = $files['tmp_name'][$num];
            $destination = "../../attachment/$newFilename";

            if (move_uploaded_file($tempFile, $destination)) {
                array_push($attachments, $newFilename);
            }
        }
        $result = $messages->send_message($_POST['reciever'], $_POST['sender'], $message, json_encode($attachments));
    }
    if($result) {
        $alert = [
            'message' => "Message sent successfully",
            'status' => 'success'
        ];
        $_SESSION['ALERT'] = json_encode($alert);

        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    else {
        $alert = [
            'message' => "Something went wrong, please try again.",
            'status' => 'error'
        ];
        $_SESSION['ALERT'] = json_encode($alert);

        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}
else {
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
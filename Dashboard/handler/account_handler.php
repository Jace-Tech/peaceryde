<?php 

session_start();

include("../../db/config.php");
include("../../models/Upload.php");
include("../../models/ResetUserPassword.php");

$uploads = new Upload($connect);
$resetPassword = new ResetUserPassword($connect);

$LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
$USER_ID = $LOGGED_USER['user_id'];


if(isset($_POST['update'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $file = $_FILES['image'];

    if(!$file['error']) {
        $upload_res = $uploads->uploadFile($file, "./pic/");
    
        extract($POST);
    
        if($upload_res['status'] == 'success') {
            $upload_res = $uploads->uploadToDB($USER_ID, $upload_res['file_name'], 'PROFILE');
            if($upload_res['status'] == 'success') {
                $query = "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email' WHERE `user_id` = '$USER_ID'";
                $result = $connect->prepare($query);
                $result->execute();
    
                if($result) {
                    $alert = [
                        'message' => "User Updated Successfully",
                        'status' => 'success'
                    ];
                    $_SESSION['ALERT'] = json_encode($alert);
    
                    header("Location: ../account.php");               
                }
                else {
                    $alert = [
                        'message' => "Something went wrong, please try again.",
                        'status' => 'error'
                    ];
                    $_SESSION['ALERT'] = json_encode($alert);
    
                    header("Location: ../account.php");
                }
            }
            else {
                $alert = [
                    'message' => "File upload failed.",
                    'status' => 'error'
                ];
                $_SESSION['ALERT'] = json_encode($alert);
    
                header("Location: ../account.php");
            }
        }
        else {
            $alert = [
                'message' => "File upload failed.",
                'status' => 'error'
            ];
            $_SESSION['ALERT'] = json_encode($alert);
    
            header("Location: ../account.php");
        }
    }
    else {
        extract($POST);
        $hashed = md5($password);

        $result = $resetPassword->changePassword($USER_ID, $hashed);

        if($result){
            $query = "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email' WHERE `user_id` = '$USER_ID'";
            $result = $connect->prepare($query);
            $result->execute();

            if($result) {
                $alert = [
                    'message' => "User Updated Successfully",
                    'status' => 'success'
                ];
                $_SESSION['ALERT'] = json_encode($alert);

                header("Location: ../account.php");               
            }
            else {
                $alert = [
                    'message' => "Something went wrong, please try again.",
                    'status' => 'error'
                ];
                $_SESSION['ALERT'] = json_encode($alert);

                header("Location: ../account.php");
            }
        }
        else {
            $alert = [
                'message' => "Something went wrong, please try again.",
                'status' => 'error'
            ];
            $_SESSION['ALERT'] = json_encode($alert);

            header("Location: ../account.php");
        }
    }
}
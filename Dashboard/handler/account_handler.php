<?php 

session_start();

include("../../db/config.php");
// include("../../db/conf.php");
include("../../models/Upload.php");
include("../../models/ResetUserPassword.php");
include("../../utils/store.php");

$uploads = new Upload($connect);
$resetPassword = new ResetUserPassword($connect);

$LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
$USER_ID = $LOGGED_USER['user_id'];


if(isset($_POST['update'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $file = $_FILES['image'];
    extract($POST);

    if(!$file['error']) {
        $uploaded = true;
        $fileNameArray = explode(".", $file['name']);
        $name = $fileNameArray[0];
        $extension = end($fileNameArray);
        $time = time();
        $filename = "$name-$time.$extension";

        $tepFile = $file['tmp_name'];
        $destination = "../upload/$filename";
    
        $uploaded = move_uploaded_file($tepFile, $destination);
    
        if(!$uploaded) {
            setUserAlert("Error uploading file", "error");
            header("Location: ./upload.php");
            exit();
        }

        try {
            // Update Profile Info
            $query = "INSERT INTO `uploads`(`user_id`, `name`, `file`, `service_id`, `status`) VALUES (:userid, :name, :filename, :service, :status)";
            $result = $connect->prepare($query);
            $result->execute([
                'userid' => $USER_ID,
                'name' => "PROFILE",
                'filename' => json_encode($filename),
                'service' => "PROFILE",
                'status' => "Awaiting approval"
            ]);
    
            if($result) {
                // Update user's info
                $query = "UPDATE `users` SET `title` = :title, `firstname` = :firstname, `middle_name`= :middle_name, `lastname` = :lastname, `email` = :email, `phone`= :phone WHERE `user_id` = :id";
                $result = $connect->prepare($query);
                $result->execute([
                    "title" => $title,
                    "firstname" => $firstname,
                    "middle_name" => $middle_name,
                    "lastname" => $lastname,
                    "email" => $email,
                    "phone" => $phone,
                    "id" => $USER_ID
                ]);

                if($result) {
                    // Update users login table
                    $hashedPassword = md5($password);
                    $query = "UPDATE `user_login` SET `email` = :email, `password` = :password WHERE `user_id` = :user";
                    $result = $connect->prepare($query);
                    $result->execute([
                        "email" => $email,
                        "password" => $hashedPassword,
                        "user" => $USER_ID
                    ]);

                    if($result) {
                        setUserAlert("Profile updated successfully", 'success');
                        header("Location: ../account.php");
                    }
                    else {
                        setUserAlert("Profile failed to update", "error");
                        header("Location: ../upload.php");
                    }

                }
            }
        } catch (PDOException $e) {
            setUserAlert("Profile failed to update", "error");
            header("Location: ../upload.php");
        }
        exit();
    }

    try {
        $query = "UPDATE `users` SET `title` = :title, `firstname` = :firstname, `middle_name`= :middle_name, `lastname` = :lastname, `email` = :email, `phone`= :phone WHERE `user_id` = :id";
        $result = $connect->prepare($query);
        $result->execute([
            "title" => $title,
            "firstname" => $firstname,
            "middle_name" => $middle_name,
            "lastname" => $lastname,
            "email" => $email,
            "phone" => $phone,
            "id" => $USER_ID
        ]);

        if($result) {
            // Update users login table
            $hashedPassword = md5($password);
            $query = "UPDATE `user_login` SET `email` = :email, `password` = :password WHERE `user_id` = :user";
            $result = $connect->prepare($query);
            $result->execute([
                "email" => $email,
                "password" => $hashedPassword,
                "user" => $USER_ID
            ]);

            if($result) {
                setUserAlert("Profile updated successfully", 'success');
                header("Location: ../account.php");
            }
            else {
                setUserAlert("Profile failed to update", "error");
                header("Location: ../upload.php");
            }

        }
    } catch (PDOException $e) {
        setUserAlert("Profile failed to update", "error");
        header("Location: ../upload.php");
    }
}
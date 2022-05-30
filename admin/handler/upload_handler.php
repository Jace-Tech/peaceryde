<?php
session_start();

include("../../functions/index.php");
include("../../db/config.php");
include("../../models/Upload.php");

$uploades = new Upload($connect);

if(isset($_POST['approve'])) {
    $id = $_POST['id'];
    $user = $_POST['user'];

    // Add Tracking
    $result = $uploades->approveFile($id);

    if($result) {
        $alert = [
            "alert_type" => "success",
            "alert_message" => "File Approved"
        ];

        $_SESSION['ADMIN_ALERT'] = json_encode($alert);

        header("Location: ../uploads.php?id=$user");
    } 
    else {
        $alert = [
            "alert_type" => "error",
            "alert_message" => "Something went wrong"
        ];

        $_SESSION['ADMIN_ALERT'] = json_encode($alert);

        header("Location: ../uploads.php?id=$user");
    }
}

if(isset($_POST['disapprove'])) {
    $id = $_POST['id'];
    $user = $_POST['user'];

    // Add Tracking
    $result = $uploades->disapproveFile($id);

    if($result) {
        $alert = [
            "alert_type" => "success",
            "alert_message" => "File Disapproved"
        ];

        $_SESSION['ADMIN_ALERT'] = json_encode($alert);

        header("Location: ../uploads.php?id=$user");
    } 
    else {
        $alert = [
            "alert_type" => "error",
            "alert_message" => "Something went wrong"
        ];

        $_SESSION['ADMIN_ALERT'] = json_encode($alert);

        header("Location: ../uploads.php?id=$user");
    }
}
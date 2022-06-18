<?php

require_once("./models.php");

$uploades = new Upload($connect);

if(isset($_POST['approve'])) {
    $id = $_POST['id'];
    $user = $_POST['user'];

    // Add Tracking
    $result = $uploades->approveFile($id);

    if($result) {
        setAdminAlert("File Approved", "success");
        header("Location: ../uploads.php?id=$user");
    } 
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../uploads.php?id=$user");
    }
}

if(isset($_POST['disapprove'])) {
    $id = $_POST['id'];
    $user = $_POST['user'];

    // Add Tracking
    $result = $uploades->disapproveFile($id);

    if($result) {
        setAdminAlert("File Disapproved", "success");
        header("Location: ../uploads.php?id=$user");
    } 
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../uploads.php?id=$user");
    }
}
<?php 

session_start();

$LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
$USER_ID = $LOGGED_USER['user_id'];

// require_once("../db/config.php");
require_once("../db/conf.php");
require_once("../models/Review.php");
require_once("../functions/index.php");


$reviews = new Review($connect);

if(isset($_POST['add'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $file = $_FILES['video'];

    extract($POST);

    if(isset($file)) {
        $result = uploadFile("../reviews/", $file);

        if(!$result) {
            header("Location: ../makereview.php");
            exit();
        }

        $reviewArr = [
            "userId" => $USER_ID,
            "rating" => $rating,
            "review" => $review,
            "type" => "video",
            "file" => $result
        ];
    }
    else {
        $reviewArr = [
            "userId" => $USER_ID,
            "rating" => $rating,
            "review" => $review,
            "type" => "text",
        ];
    }

    $result = $reviews->addReview($reviewArr);
    if($result) {
        $alert = [
            "status" => "success",
            "message" => "Review added successfully"
        ];

        $_SESSION['ALERT'] = json_encode($alert);
        header('Location: ../makereview.php');
    }
    else {
        $alert = [
            "status" => "error",
            "message" => "Something went wrong"
        ];

        $_SESSION['ALERT'] = json_encode($alert);
        header('Location: ../makereview.php');
    }
}
else {
    header("Location: ../makereview.php");
}
<?php 

session_start();

$LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
$USER_ID = $LOGGED_USER['user_id'];

include("../db/config.php");
include("../models/Review.php");

$reviews = new Review($connect);

if(isset($_POST['add'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    $reviewArr = [
        "userId" => $USER_ID,
        "rating" => $rating,
        "review" => $review,
    ];

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
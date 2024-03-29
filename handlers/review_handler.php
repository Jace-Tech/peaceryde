<?php 

session_start();

$LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
$USER_ID = $LOGGED_USER['user_id'];

require_once("../db/config.php");
// require_once("../db/conf.php");
require_once("../models/Review.php");
require_once("../functions/index.php");
require_once("../utils/store.php");



$reviews = new Review($connect);

if(isset($_POST['add'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $file = $_FILES['video'];

    extract($POST);

    if(!$rating) {
        setUserAlert("You didn't add a rating", "error");
        header("Location: ../makereview");
        exit();
    } 

    if(!($file['error'])) {
        $result = uploadFile("../reviews/", $file);

        if(!$result) {
            setUserAlert("Upload Failed", "error");
            header("Location: ../makereview");
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
        $firstname = getUser($connect, $USER_ID)['firstname'];
        $lastname = getUser($connect, $USER_ID)['lastname'];
        setAdminNotification($connect, "./reviews?", json_encode(["MAIN_ADMIN"]), "<strong>$firstname $lastname</strong> posted a review");
        $_SESSION['ALERT'] = json_encode($alert);
        header('Location: ../makereview');
    }
    else {
        $alert = [
            "status" => "error",
            "message" => "Something went wrong"
        ];

        $_SESSION['ALERT'] = json_encode($alert);
        header('Location: ../makereview');
    }
}
else {
    header("Location: ../makereview");
}
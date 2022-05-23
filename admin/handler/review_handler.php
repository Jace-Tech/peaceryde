<?php 

require("../../db/config.php");
require("../../models/Review.php");

$reviews = new Review($connect);

if(isset($_POST['feature'])) {
    $review = $_POST['feature'];
    $result = $reviews->makeFeatured($review);

    if($result) {
        $alert = [
            'alert_message' => "Review added to feature",
            'alert_type' => 'success'
        ];

        session_start();
        $_SESSION['alert'] = json_encode($alert);

        header("Location: ../reviews.php");
    }
}

if(isset($_POST['unfeature'])) {
    $review = $_POST['unfeature'];
    $result = $reviews->removeFeature($review);

    if($result) {
        $alert = [
            'alert_message' => "Review removed from featured",
            'alert_type' => 'success'
        ];

        session_start();
        $_SESSION['alert'] = json_encode($alert);

        header("Location: ../reviews.php");
    }
}
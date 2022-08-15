<?php 

require_once("./models.php");

$reviews = new Review($connect);

if(isset($_POST['feature'])) {
    $review = $_POST['feature'];
    $result = $reviews->makeFeatured($review);

    if($result) {
        setAdminAlert("Review added to feature", 'success');
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

if(isset($_POST['unfeature'])) {
    $review = $_POST['unfeature'];
    $result = $reviews->removeFeature($review);

    if($result) {
        setAdminAlert("Review removed from featured", 'success');
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
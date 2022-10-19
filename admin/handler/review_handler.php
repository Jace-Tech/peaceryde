<?php

require_once("./models.php");

$reviews = new Review($connect);

if (isset($_POST['feature'])) {
    $review = $_POST['feature'];
    $result = $reviews->makeFeatured($review);

    if ($result) {
        setAdminAlert("Review added to feature", 'success');
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['unfeature'])) {
    $review = $_POST['unfeature'];
    $result = $reviews->removeFeature($review);

    if ($result) {
        setAdminAlert("Review removed from featured", 'success');
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_GET['del'])) {
    $review = $_GET['del'];

    try {
        $result = $reviews->deleteReview($review);

        if ($result) {
            setAdminAlert("Review Deleted", 'success');
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            setAdminAlert("Failed to delete review", 'error');
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } catch (Exception $e) {
        setAdminAlert("Failed to delete review", 'error');
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

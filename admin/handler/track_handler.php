<?php

require_once("./models.php");

$trackings = new Tracking($connect);

if(isset($_POST['tracking'])) {
    $track = filter_field($_POST['track']);
    $user_id = $_POST['id'];

    // Add Tracking
    $result = $trackings->addTracking($user_id, $track);

    if($result) {
        setAdminAlert("Track Updated successfully", "success");
        header("Location: ../users");
    } 
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users");
    }
}
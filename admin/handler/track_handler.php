<?php
session_start();

include("../../functions/index.php");
include("../../db/config.php");
include("../../models/Tracking.php");

$trackings = new Tracking($connect);

if(isset($_POST['tracking'])) {
    $track = filter_field($_POST['track']);
    $user_id = $_POST['id'];

    // Add Tracking
    $result = $trackings->addTracking($user_id, $track);

    if($result) {
        $alert = [
            "alert_type" => "success",
            "alert_message" => "Track Updated successfully"
        ];

        $_SESSION['alert'] = json_encode($alert);

        header("Location: ../users.php");
    } 
    else {
        $alert = [
            "alert_type" => "error",
            "alert_message" => "Something went wrong"
        ];

        $_SESSION['alert'] = json_encode($alert);

        header("Location: ../users.php");
    }
}
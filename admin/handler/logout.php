<?php

include("../../functions/index.php");

if(isset($_POST['logout'])){
    $time = time() - getWeekTime(1);
    setcookie("LOGGED_USER", "jdhdsdvjdsbv", $time, '/');
    setcookie("CRSF_TOKEN", "dscvgdscgds", $time, '/');

    $alert = [
        'alert_message' => "Logged out successfully",
        'alert_type' => 'success'
    ];

    $_SESSION['alert'] = json_encode($alert);
    header('location: ../index.php');
}
<?php

require_once("./models.php");

if(isset($_POST['logout'])){
    $time = time() - getWeekTime(1);
    setcookie("LOGGED_ADMIN", "jdhdsdvjdsbv", $time, '/');
    setcookie("CRSF_TOKEN", "dscvgdscgds", $time, '/');

    setAdminAlert("Logged out successfully", 'success');
    header('location: ../index.php');
}
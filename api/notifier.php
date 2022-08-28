<?php  

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once("../db/config.php");
require_once("../functions/index.php");
require_once("../utils/store.php");


if(isset($_GET['notify'])) {
    $id = $_GET['notify'];
    $unreadNotifications = getNotications($connect, $id);
    echo json_encode($unreadNotifications);
}
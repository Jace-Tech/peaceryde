<?php  

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once("../db/config.php");
require_once("../functions/index.php");
require_once("../utils/store.php");
require_once("../models/Message.php");

$messages = new Message($connect);


if(isset($_GET['messenger'])) {
    $id = $_GET['messenger'];
    $unreadMessages = $messages->get_user_unread_messages($id);
    // if(!$unreadMessages) {
    //     echo "[]";
    //     exit();
    // }
    echo json_encode($unreadMessages);
}
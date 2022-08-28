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
    $messages = [];

    foreach ($unreadMessages as $msg) {
        $user = getUser($connect, $msg['sender_id']);
        $item = array_merge($msg, ["_sender" => $user]);
        array_push($messages, $item);
    }
    echo json_encode($messages);
}

if(isset($_GET['convo'])) {
    $id = $_GET['convo'];
    $other = $_GET['other'];
    $_messages = $messages->get_conversation($id, $other);
    $MASSAGES = [];

    foreach ($_messages as $msg) {
        $user = getUser($connect, $msg['sender_id']);
        $item = array_merge($msg, ["_sender" => $user]);
        array_push($MASSAGES, $item);
    }
    echo json_encode($MASSAGES);
}
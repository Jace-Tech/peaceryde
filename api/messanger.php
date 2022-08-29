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
    $filtered = array_filter($_messages, function ($message){
        return ($message['is_read'] == 0);
    });
    $MASSAGES = [];

    foreach ($filtered as $msg) {
        if($msg['sender_id'] !== $id) {
            $admin = getAdmin($connect, $msg['user_id']);
            $user = getUser($connect, $msg['sender_id']);
            $profilePic = getProfilePic($connect, $msg['sender_id'])['file'];
            $item = array_merge($msg, ["_sender" => $user, "_admin" => $admin, "pic" => "https://peacerydeafrica.com/Dashboard/pic/$profilePic"]);
        }
        else {
            $admin = getAdmin($connect, $msg['sender_id']);
            $user = getUser($connect, $msg['user_id']);
            $profilePic = getProfilePic($connect, $msg['user_id'])['file'];
            $item = array_merge($msg, ["_sender" => $user, "_admin" => $admin, "pic" => "https://peacerydeafrica.com/Dashboard/pic/$profilePic"]);
        }
        array_push($MASSAGES, $item);
    }
    echo json_encode($MASSAGES);
}

if(isset($_GET['convo_user'])) {
    $id = $_GET['convo_user'];
    $other = $_GET['other'];
    $_messages = $messages->get_conversation($id, $other);
    $filtered = array_filter($_messages, function ($message){
        return ($message['is_read'] == 0);
    });
    $MASSAGES = [];

    foreach ($filtered as $msg) {
        if($msg['sender_id'] == $id) {
            $admin = getAdmin($connect, $msg['user_id']);
            $user = getUser($connect, $msg['sender_id']);
            $profilePic = getProfilePic($connect, $msg['sender_id'])['file'];
            $item = array_merge($msg, ["_sender" => $user, "_admin" => $admin, "pic" => "https://peacerydeafrica.com/Dashboard/pic/$profilePic"]);
        }
        else {
            $admin = getAdmin($connect, $msg['sender_id']);
            $user = getUser($connect, $msg['user_id']);
            $profilePic = getProfilePic($connect, $msg['user_id'])['file'];
            $item = array_merge($msg, ["_sender" => $user, "_admin" => $admin, "pic" => "https://peacerydeafrica.com/Dashboard/pic/$profilePic"]);
        }
        array_push($MASSAGES, $item);
    }
    echo json_encode($MASSAGES);
}

if(isset($_GET['unread'])) {
    $id = $_GET['unread'];
    $other = $_GET['other'];
    $_messages = $messages->get_conversation($id, $other);
    $filtered = array_filter($_messages, function ($message){
        return ($message['is_read'] == 0);
    });
    echo json_encode([
        "count" => count($filtered)
    ]);
}

if(isset($_GET['read'])) {
    $id = $_GET['read'];
    $user = $_GET['user'];

    $result = $messages->mark_read($id, $user);
    $unreadMessages = $messages->get_user_unread_messages($id);
    if($result) {
        echo json_encode([
            "id" => $id,
            "count" => count($unreadMessages)
        ]);
    }else {
        echo json_encode(["status" => false]);
    }
}
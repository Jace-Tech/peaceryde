<?php


session_start();
require_once("../db/config.php");

if (isset($_POST['subscribe'])) {
    $email = filter_var(trim($_POST['subscribe']));

    // Check email exits 
    try {
        $query = "SELECT * FROM newsletter WHERE email = ?";
        $result = $connect->prepare($query);

        $subscriber = $result->fetch();

        if ($subscriber) throw new Exception("You have already subscribed");
    } catch (Exception $e) {
        //throw $th;
    }
}

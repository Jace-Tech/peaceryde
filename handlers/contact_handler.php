<?php 
session_start();

// require_once("../db/conf.php");
require_once("../functions/index.php");
require_once("../utils/country_fee.php");
require_once("../utils/store.php");
require_once("../setup.php");
require_once("../db/config.php");
require_once("../models/Message.php");

if(isset($_REQUEST['contact'])) {
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    sendMail("Contact Form Message", $message, $email, "info@peacerydeafrica.com");
    setUserAlert("Message sent", "success");  

    header("Location:" . $_SERVER['HTTP_REFERER']);
}
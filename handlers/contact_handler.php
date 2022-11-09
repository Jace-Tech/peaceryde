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
    $userEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    $from = "noreply@peacerydeafrica.com";
    // $toEmail = "info@peacerydeafrica.com";
    // $toEmail = "peaceryde@gmail.com";
    $toEmail = "theonlyfreddie@yahoo.com";
    $admin = "PeaceRydeAfrica LLC";
    $template = file_get_contents("../template/contact.html");

    $template = str_replace("{{ admin }}", $admin, $template);
    $template = str_replace("{{ name }}", $name, $template);
    $template = str_replace("{{ message }}", $message, $template);
    $template = str_replace("{{ email }}", $userEmail, $template);
    $template = str_replace("{{ phone }}", $phone, $template);

    sendMail("Contact Form Message", $template, $from, $toEmail, true);
    setUserAlert("Message sent", "success");  

    header("Location:" . $_SERVER['HTTP_REFERER']);
}

<?php 

session_start();

require_once("../db/conf.php");
require_once("../functions/index.php");
require_once("../utils/country_fee.php");
require_once("../utils/store.php");
require_once("../setup.php");
// require_once("../db/config.php");

if(isset($_POST['apply'])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $PAID_SERVICES = ["srvs-001", "srvs-002", "srvs-003"];

    $service = getService($connect, $POST['service'])['service'];
    $name = APP_NAME;

    if(!in_array($POST['service'], $PAID_SERVICES)) {

        // Email the Admin
        $subject = "<h3> Application for $service </h3>";
        $message = "<p>Hi $name.</p>";
        
        $message = "<p>My name is {$POST['firstname']} {$POST['lastname']}</p>";
        $message .= "<p>{$POST['message']}</p>";
        $message .= "<p>Email: <a href='mailto:{$POST['email']}?subject=$service'>{$POST['email']}</a> </p>";
        $message .= "<p>Firstname: {$POST['firstname']} </p>";
        $message .= "<p>Lastname: {$POST['lastname']} </p>";
        $message .= "<p>Phone No: <a href='tel:+{$POST['countryCode']}{$POST['phone']}'>+{$POST['countryCode']}{$POST['phone']}</a> </p>";

        $to = "mailto:theonlyfreddie@gmail.com";

        sendMail($subject, $message, $POST['email'], $to);

        $alert = [
            "message" => "Request sent",
            "status" => "success"
        ];

        $_SESSION['ALERT'] = json_encode($alert);
        header("Location: ../index.php");
    }
    else {
        $_SESSION['APPLY_FORM_DATA'] = json_encode($POST);

        switch ($POST['service']) {
            case "srvs-001":
                header("Location: ../NTWPForm.php");
                break;
                
            case "srvs-002":
                header("Location: ../NBVForm.php");
                break;

            case "srvs-003":
                header("Location: ../BIForm.php");
                break;
        }
    }

}
<?php 

require("../addons/crsf_auth.php");
require_once("../../db/config.php");
require_once("../../functions/index.php");
require_once("../../models/Admin.php");
require("../../setup.php");

$admin = new Admin($connect);

if(isset($_POST['addAdmin'])){
    $name = filter_field($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $country = filter_var_array($_POST['country'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $services = filter_field($_POST['service']);
    $admin_id = $admin->generate_id();

    $user = [
        'name' => $name,
        'countries' => $country,
        'services' => $services,
        'password' => $hashed_password,
        'admin_id' => $admin_id,
        'status' => "active",
        'type' => "LOW",
        'email' => $email
    ];

    $admin_result = $admin->addAdmin($user);

    if($admin_result) {
        $subadmin = $admin->addSubAdmin($user);

        if($subadmin) {
            $alert = [
                'alert_type' => 'success',
                'alert_message' => "Admin Created Successfully"
            ];

            $subject = "REGISTRATION";
            $message = "<h2>Hi $name,</h2>";
            $message .= "<p>You've been successfully added as a sub admin at $APP_NAME</p>";
            $message .= "<p>Your default password is $password </p>";
    
            sendMail($subject, $message, $EMAIL_ADDRESS, $email);

            session_start();
            $_SESSION['alert'] = json_encode($alert);
            header('Location: ../subadmins.php');
        }
    }

}

if(isset($_POST['editAdmin'])){
    $name = filter_field($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $country = filter_var_array($_POST['country'], FILTER_SANITIZE_STRING);
    $services = filter_field($_POST['service']);
    $id = $_POST['id'];

    $user = [
        'name' => $name,
        'countries' => $country,
        'services' => $services,
        'status' => "active",
        'type' => "LOW",
        'email' => $email
    ];

    $admin_result = $admin->editAdmin($user, $id);

    if($admin_result) {
        $subadmin = $admin->editSubAdmin($user, $id);

        if($subadmin) {
            $alert = [
                'alert_type' => 'success',
                'alert_message' => "Admin Updated Successfully"
            ];

            session_start();
            $_SESSION['alert'] = json_encode($alert);
            header('Location: ../subadmins.php');
        }
    }

}

if(isset($_POST['deleteAdmin'])){
    $admin_id = $_POST['admin'];
    $result = $admin->deleteAdmin($admin_id);

    if(!$result){
        $alert = [
            'alert_message' => "Something went wrong. Please try again",
            'alert_type' => 'error'
        ];

        session_start();
        $_SESSION['alert'] = json_encode($alert);

        header('Location: ../subadmins.php');
    }
    
    $alert = [
        'alert_message' => "Admin deleted successfully",
        'alert_type' => 'success'
    ];

    session_start();
    $_SESSION['alert'] = json_encode($alert);

    header('Location: ../subadmins.php');
}

if(isset($_POST['suspendAdmin'])){
    $admin_id = $_POST['suspendAdmin'];
    $result = $admin->suspendAdmin($admin_id);

    if(!$result){
        $alert = [
            'alert_message' => "Something went wrong. Please try again",
            'alert_type' => 'error'
        ];

        session_start();
        $_SESSION['alert'] = json_encode($alert);

        header('Location: ../subadmins.php');
        exit();
    }
    
    $alert = [
        'alert_message' => "Admin Suspended",
        'alert_type' => 'success'
    ];

    session_start();
    $_SESSION['alert'] = json_encode($alert);

    header('Location: ../subadmins.php');
}

if(isset($_POST['unSuspendAdmin'])){
    $admin_id = $_POST['unSuspendAdmin'];
    $result = $admin->unSuspendAdmin($admin_id);

    if(!$result){
        $alert = [
            'alert_message' => "Something went wrong. Please try again",
            'alert_type' => 'error'
        ];

        session_start();
        $_SESSION['alert'] = json_encode($alert);

        header('Location: ../subadmins.php');
        exit();
    }
    
    $alert = [
        'alert_message' => "Admin Unsuspended",
        'alert_type' => 'success'
    ];

    session_start();
    $_SESSION['alert'] = json_encode($alert);

    header('Location: ../subadmins.php');
}
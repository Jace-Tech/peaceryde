<?php 
require_once("./models.php");

$admin_model = new Admin($connect);
// extract($SET_UP);

if(isset($_POST['register'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_field($_POST['name']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user = [
        'email' => $email,
        'name' => $name,
        'password' => $password,
        'type' => 'HIGH'
    ];

    $response = $admin_model->addAdmin($user);

    if($response){
        setAdminAlert("Registeration Successful", 'success');
        header('location: ../index.php');
    }
    else{
        setAdminAlert("Something went wrong, please try again.", 'error');
        header('location: ../signup.php');
    }
}

if(isset($_POST['login'])) {
    extract($_POST);

    $credientials = [
        'email' => $email,
        'password' => $password
    ];

    $response = $admin_model->loginAdmin($credientials);

    extract($response);

    if($status !== 'success'){
        setAdminAlert($message, 'error');
        header('Location: ../index.php');
        exit();
    }

    $time = time() + getWeekTime(1);
    $token = "tok-" . rand(10000000, 1000000000);
    
    setcookie("LOGGED_ADMIN", json_encode($user), $time, '/');
    setcookie("CRSF_TOKEN", $token, $time, '/');

    setAdminAlert($message, "success");

    header('Location: ../dashboard.php');
}
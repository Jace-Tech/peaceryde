<?php 

require_once("./models.php");


$admin = new Admin($connect);

if(isset($_POST['addAdmin'])){
    $name = filter_field($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $country = filter_var_array($_POST['country'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $services = filter_var_array($_POST['service'], FILTER_SANITIZE_STRING);
    $admin_id = $admin->generate_id();

    if($admin->checkEmail($email)) {
        setAdminAlert("Email already exists", 'success');
        header('Location: ../subadmins.php');
        exit();
    }

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
            setAdminAlert("Admin Created Successfully", 'success');

            $subject = "REGISTRATION";
            $message = "<h2>Hi $name,</h2>";
            $message .= "<p>You've been successfully added as a sub admin at Peacerydeafrica </p>";
            $message .= "<p>Your default password is $password </p>";
    
            sendMail($subject, $message, "billing@peacerydeafrica.com", $email);
            header('Location: ../subadmins.php');
        }
    }

}

if(isset($_POST['editAdmin'])){
    $name = filter_field($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $country = filter_var_array($_POST['country'], FILTER_SANITIZE_STRING);
    $services = filter_var_array($_POST['service']);
    $id = $_POST['id'];

    $user = [
        'name' => $name,
        'countries' => $country,
        'services' => json_encode($services),
        'status' => "active",
        'type' => "LOW",
        'email' => $email
    ];

    $admin_result = $admin->editAdmin($user, $id);

    if($admin_result) {
        $subadmin = $admin->editSubAdmin($user, $id);

        if($subadmin) {
            setAdminAlert("Admin Updated Successfully", 'success');
            header('Location: ../subadmins.php');
        }
    }

}

if(isset($_POST['deleteAdmin'])){
    $admin_id = $_POST['admin'];
    $result = $admin->deleteAdmin($admin_id);

    if(!$result){
        setAdminAlert("Something went wrong. Please try again", 'error');
        header('Location: ../subadmins.php');
    }
    
    setAdminAlert("Admin deleted successfully", 'success');
    header('Location: ../subadmins.php');
}

if(isset($_POST['suspendAdmin'])){
    $admin_id = $_POST['suspendAdmin'];
    $result = $admin->suspendAdmin($admin_id);

    if(!$result){
        setAdminAlert("Something went wrong. Please try again", 'error');
        header('Location: ../subadmins.php');
        exit();
    }
    
    setAdminAlert("Admin Suspended", 'success');
    header('Location: ../subadmins.php');
}

if(isset($_POST['unSuspendAdmin'])){
    $admin_id = $_POST['unSuspendAdmin'];
    $result = $admin->unSuspendAdmin($admin_id);

    if(!$result){
        setAdminAlert("Something went wrong. Please try again", 'error');
        header('Location: ../subadmins.php');
        exit();
    }
    
    setAdminAlert("Admin Unsuspended", 'success');
    header('Location: ../subadmins.php');
}

if(isset($_POST["remove"])) {
    $admin = $_POST["admin"];
    $user = $_POST["user"];

    $query = "DELETE FROM `sub_admin_users` WHERE `sub_admin` = :admin AND `user` = :user";
    $result = $connect->prepare($query);
    $result->execute([
        'admin' => $admin,
        'user' => $user
    ]);

    if($result) {
        setAdminAlert("User Removed Successfully", "success");
        header("Location: ../subadmin-details.php?subamin=$admin");
    }
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../subadmin-details.php?subamin=$admin");
    }
}
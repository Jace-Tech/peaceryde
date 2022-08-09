<?php 

require_once("./models.php");

$USER = new User($connect);
$USER_SERVICE = new UserService($connect);
$USER_LOGIN = new UserLogin($connect);
$USER_UPLOAD = new UserLogin($connect);
$USER_SUBADMIN = new SubadminUsers($connect);
$USER_UPLOAD = new Upload($connect);

if(isset($_POST['add'])) {
    $firstname = filter_field($_POST['firstname']);
    $title = filter_field($_POST['title']);
    $lastname = filter_field($_POST['lastname']);
    $email = filter_field($_POST['email'], "email");
    $service = filter_field($_POST['service']);
    $password = $_POST['password'];

    $data = [
        "email" => $email,
        "title" => $title,
        "lastname" => $lastname,
        "firstname" => $firstname,
        "serviceId" => $service,
    ];

    // Added User
    $result = $USER->add_new_user($data);
    $userId = $result['userId'];

    // Add Login Details
    $data = [
        "password" => $password,
        "email" => $email,
        "user_id" => $userId
    ];

    $result = $USER_LOGIN->register($data);
    $subject = "Account Creation";
    $message = "<p>Hi $firstname,</p>";
    $message .= "<p>Here are your account details</p>";
    $message .= "<ul>
    <li>Username / Email: $email</li>
    <li>Password: $password</li>
    </ul>";

    if($result) {
        sendMail($subject, $message, FROM, $email);
        setAdminAlert("User added successfully", 'success');
        header('Location: ../users.php');
    }
    else {
        setAdminAlert("Something went wrong", 'error');
        header('Location: ../users.php');
    }
    
}

if(isset($_POST['update-status'])) {
    $user = $_POST['user'];
    $service = $_POST['service'];
    $status = $_POST['status'];

    $result = $USER_SERVICE->updateStatus($user, $service, $status);

    if($result) {
        setAdminAlert("Status updated successfully", 'success');
        header("Location: ../user-details.php?user=$user");
    }
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../user-details.php?user=$user");
    }
}

if(isset($_POST['approve'])) {
    $id = $_POST['doc'];
    $user = $_POST['user'];

    $result = $USER_UPLOAD->approveFile($id);

    if($result) {
        setAdminAlert("File Successfully Approved", 'success');
        header("Location: ../user-details.php?user=$user");
    }
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../user-details.php?user=$user");
    }
}

if(isset($_POST['disapprove'])) {
    $id = $_POST['doc'];
    $user = $_POST['user'];

    $result = $USER_UPLOAD->disapproveFile($id);

    if($result) {
        setAdminAlert("File Successfully Approved", 'success');
        header("Location: ../user-details.php?user=$user");
    }
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../user-details.php?user=$user");
    }
}

if(isset($_POST['change_admin'])) {
    $id = $_POST['id'];
    $user = $_POST['user'];
    $subadmin = $_POST['subadmin'];

    $result = $USER_SUBADMIN->updateUserAdmin($subadmin, $id);
    if($result) {
        setAdminAlert("User's subadmin updated successfully", "success");
        header("Location: ../user-details.php?user=$user");
    }
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../user-details.php?user=$user");
    }
}

if(isset($_POST['assign'])) {
    // $id = $_POST['id'];
    $user = $_POST['user'];
    $subadmin = $_POST['subadmin'];

    $data = [
        'user' => $user,
        'subadmin' => $subadmin
    ];

    $result = $USER_SUBADMIN->addUser($data);
    if($result) {
        setAdminAlert("User's subadmin updated successfully", "success");
        header("Location: ../user-details.php?user=$user");
    }
    else {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../user-details.php?user=$user");
    }
}
<?php 

require_once("./models.php");

$USER = new User($connect);
$PAYMENT = new Payment($connect);
$USER_SERVICE = new UserService($connect);
$USER_LOGIN = new UserLogin($connect);
$USER_UPLOAD = new UserLogin($connect);
$USER_SUBADMIN = new SubadminUsers($connect);
$USER_UPLOAD = new Upload($connect);

if(isset($_POST['add-subadmin-user'])) {
    $firstname = filter_field($_POST['firstname']);
    $title = filter_field($_POST['title']);
    $lastname = filter_field($_POST['lastname']);
    $email = filter_field($_POST['email'], "email");
    $service = filter_field($_POST['service']);
    $password = $_POST['password'];
    $subAdmin = $_POST['admin'];

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
        // Set Notification
        if($LOGGED_ADMIN["admin_id"] == "MAIN_ADMIN") {
            $admin = json_encode(["MAIN_ADMIN"]);
        }
        else {
            $admin = json_encode(["MAIN_ADMIN", $LOGGED_ADMIN['admin_id']]);
        }
        setAdminNotification($connect, "./user-details.php?user=$userId", $admin, "A new user was added, click to view");
        addSubAdminUserAlt($connect, $userId, $subAdmin);
        setAdminAlert("User added successfully", 'success');
        header('Location: ../users.php');
    }
    else {
        setAdminAlert("Something went wrong", 'error');
        header('Location: ../users.php');
    }
    
}

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

if(isset($_POST["add-service"])) {
    $service = $_POST["service"];
    $id = $_POST["id"];
    $amount = floatval($_POST["amount"]);
    $serviceStatus = $_POST["serviceStatus"];
    $paymentStatus = $_POST["paymentStatus"];

    try {
        // Add service
        $userServiceResult = $USER->add_user_service($id, $service);

        if(!$userServiceResult) {
            setAdminAlert("Error adding service", "error");
            header("Location: ../user-details.php?user=$id");
            exit();
        }

        // Update service status
        $USER_SERVICE->updateStatus($id, $service, $serviceStatus);

        // Add the payment details
        $paymentDetails = [
           'userId' => $userServiceResult['userId'],
            'ref' => generateTransactionId(),
            'service' => $userServiceResult['id'],
            'amount' => $amount,
            'status' => $paymentStatus
        ];

        $result = $PAYMENT->addPayment($paymentDetails);

        if($result) {
            setAdminAlert("Service added successfully", 'success');
            header("Location: ../user-details.php?user=$id");
        }
        else {
            setAdminAlert("Error adding service", "error");
            header("Location: ../user-details.php?user=$id");
        }

    } catch (Exception $e) {
        setAdminAlert("Error adding service", "error");
        header("Location: ../user-details.php?user=$id");
        exit();
    }
}

if(isset($_GET['delete_id'])) {
    $userId = $_GET['delete_id'];

    // REMOVE FROM THE FOLLOWING TABLES

    // BI Table
    try {

        $queryCheckBi = "SELECT * FROM `bi_table` WHERE `user_id` = ?";
        $resultCheckBi = $connect->prepare($queryCheckBi);
        $resultCheckBi->execute([$userId]);
    
        if($resultCheckBi->rowCount() > 0) {
            $queryDeleteBi = "DELETE FROM `bi_table` WHERE `user_id` = ?";
            $resultDeleteBi = $connect->prepare($queryDeleteBi);
            $resultDeleteBi->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Message Table
    try {

        $queryCheckMessage = "SELECT * FROM `messages` WHERE `sender_id` = ?";
        $resultCheckMessage = $connect->prepare($queryCheckMessage);
        $resultCheckMessage->execute([$userId]);
    
        if($resultCheckMessage->rowCount() > 0) {
            $queryDeleteMessage = "DELETE FROM `messages` WHERE `sender_id` = ?";
            $resultDeleteMessage = $connect->prepare($queryDeleteMessage);
            $resultDeleteMessage->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Payment Card Table
    try {

        $queryCheckPaycard = "SELECT * FROM `payment_card` WHERE `user_id` = ?";
        $resultCheckPaycard = $connect->prepare($queryCheckPaycard);
        $resultCheckPaycard->execute([$userId]);
    
        if($resultCheckPaycard->rowCount() > 0) {
            $queryDeletePaycard = "DELETE FROM `payment_card` WHERE `user_id` = ?";
            $resultDeletePaycard = $connect->prepare($queryDeletePaycard);
            $resultDeletePaycard->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Subadmin users Table
    try {

        $queryCheckSubadminUsers = "SELECT * FROM `sub_admin_users` WHERE `user` = ?";
        $resultCheckSubadminUsers = $connect->prepare($queryCheckSubadminUsers);
        $resultCheckSubadminUsers->execute([$userId]);
    
        if($resultCheckSubadminUsers->rowCount() > 0) {
            $queryDeleteSubadminUsers = "DELETE FROM `sub_admin_users` WHERE `user` = ?";
            $resultDeleteSubadminUsers = $connect->prepare($queryDeleteSubadminUsers);
            $resultDeleteSubadminUsers->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Tracking Table
    try {

        $queryCheckTracking = "SELECT * FROM `tracking` WHERE `user_id` = ?";
        $resultCheckTracking = $connect->prepare($queryCheckTracking); 
        $resultCheckTracking->execute([$userId]);
    
        if($resultCheckTracking->rowCount() > 0) {
            $queryDeleteTracking = "DELETE FROM `tracking` WHERE `user_id` = ?";
            $resultDeleteTracking = $connect->prepare($queryDeleteTracking);
            $resultDeleteTracking->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Upload Table
    try {

        $queryCheckUploads = "SELECT * FROM `uploads` WHERE `user_id` = ?";
        $resultCheckUploads = $connect->prepare($queryCheckUploads); 
        $resultCheckUploads->execute([$userId]);
    
        if($resultCheckUploads->rowCount() > 0) {
            $queryDeleteUploads = "DELETE FROM `uploads` WHERE `user_id` = ?";
            $resultDeleteUploads = $connect->prepare($queryDeleteUploads);
            $resultDeleteUploads->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Users Table
    try {

        $queryCheckUser = "SELECT * FROM `users` WHERE `user_id` = ?";
        $resultCheckUser = $connect->prepare($queryCheckUser); 
        $resultCheckUser->execute([$userId]);
    
        if($resultCheckUser->rowCount() > 0) {
            $queryDeleteUser = "DELETE FROM `users` WHERE `user_id` = ?";
            $resultDeleteUser = $connect->prepare($queryDeleteUser);
            $resultDeleteUser->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Users Login Table
    try {

        $queryCheckUserLogin = "SELECT * FROM `user_login` WHERE `user_id` = ?";
        $resultCheckUserLogin = $connect->prepare($queryCheckUserLogin); 
        $resultCheckUserLogin->execute([$userId]);
    
        if($resultCheckUserLogin->rowCount() > 0) {
            $queryDeleteUserLogin = "DELETE FROM `user_login` WHERE `user_id` = ?";
            $resultDeleteUserLogin = $connect->prepare($queryDeleteUserLogin);
            $resultDeleteUserLogin->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    // Users Service Table
    try {

        $queryCheckUserService = "SELECT * FROM `user_services` WHERE `user_id` = ?";
        $resultCheckUserService = $connect->prepare($queryCheckUserService); 
        $resultCheckUserService->execute([$userId]);
    
        if($resultCheckUserService->rowCount() > 0) {
            $queryDeleteUserService = "DELETE FROM `user_services` WHERE `user_id` = ?";
            $resultDeleteUserService = $connect->prepare($queryDeleteUserService);
            $resultDeleteUserService->execute([$userId]);
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Something went wrong", "error");
        header("Location: ../users.php");
        die();
    }

    setAdminAlert("User deleted successfully", 'success');
    header('Location: ../users.php');
    
}

if(isset($_POST['update-user'])) {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $middlename = $_POST['middlename'];
    $id = $_POST['user'];

    try {
        $query = "UPDATE `users` SET `firstname` = :firstname, `lastname` = :lastname, `middle_name` = :middlename, `email` = :email, `gender` = :gender, `dob` = :dob WHERE `user_id` = :user";
        $result = $connect->prepare($query);
        $result->execute([
            "firstname" => $firstname,
            "lastname" => $lastname,
            "middlename" => $middlename,
            "email" => $email,
            "gender" => $gender,
            "dob" => $dob,
            "user" => $id
        ]);

        if ($result) {
            setAdminAlert("User profile updated successfully", "success");
            header("Location: ../user-details.php?user=$id");
        }
        else {
            setAdminAlert("Failed to update user profile", "error");
            header("Location: ../user-details.php?user=$id");
        }

    } catch (PDOException $e) {
        setAdminAlert("Failed to update user profile", "error");
        header("Location: ../user-details.php?user=$id");
    }
}
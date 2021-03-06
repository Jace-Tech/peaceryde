<?php 


function getAllUsers($connect) {
    $query = "SELECT * FROM users";
    $result = $connect->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

function getAllPayAddons($connect) {
    $query = "SELECT * FROM pay_addons";
    $result = $connect->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

function getService($connect, $id) {
    $query = "SELECT * FROM services WHERE service_id = ? OR id = ?";
    $result = $connect->prepare($query);
    $result->execute([$id, $id]);

    return $result->fetch();
}

function getServicePayment($connect, $userId, $id) {
    $query = "SELECT * FROM payment WHERE service = ? AND `user_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$id, $userId]);

    return $result->fetch();
}

function getUsersUploads($connect, $userId) {
    $query = "SELECT * FROM uploads WHERE `user_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$userId]);

    return $result->fetchAll();
}

function getAllSubAdmins($connect){
    $query = "SELECT * FROM `admin` WHERE `admin_id` != ?";
    $result = $connect->prepare($query);
    $result->execute(['MAIN_ADMIN']);

    return $result->fetchAll();
}

function getUsersSubAdmin($connect, $userId) {
    $query = "SELECT * FROM sub_admin_users WHERE `user` = ?";
    $result = $connect->prepare($query);
    $result->execute([$userId]);

    return $result->fetch();
}

function getSubAdmin($connect, $adminId) {
    $query = "SELECT * FROM admin WHERE `admin_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$adminId]);

    return $result->fetch();
}

function getSubAdminService ($connect, $adminId) {
    $query = "SELECT * FROM `sub_admin` WHERE `admin_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$adminId]);

    return $result->fetch();
}

function getSubAdminCountries ($connect, $adminId) {
    try {
        $query = "SELECT * FROM `sub_admin` WHERE `admin_id` = ?";
        $result = $connect->prepare($query);
        $result->execute([$adminId]);

        return json_decode($result->fetch()['countries'], true);
    } catch (PDOException $e) {
        return false;
    }
}


function checkAdminCountry ($connect, $country) {
    $admins = getAllSubAdmins($connect);

    foreach ($admins as $admin) {
        $countries = getSubAdminCountries($connect, $admin['admin_id']);

        if(in_array($country, $countries)) {
            return [
                "admin" => $admin,
                "countries" => $countries
            ];
        }
        else {
            return NULL;
        }
    }
}

function assignAutomatically($connect) {
    $users = getAllUsers($connect);

    foreach ($users as $user) {
        $check = checkAdminCountry($connect, $user['country']);

        if($check) {
            $admin = $check['admin'];

            $check_query = "SELECT * FROM sub_admin_users WHERE user = :user AND sub_admin = :admin";
            $result_query = $connect->prepare($check_query);

            $result_query->execute([
                "user" => $user['user_id'], 
                "admin" => $admin['admin_id']
            ]);

            if($result_query->rowCount() < 1) {
                $query = "INSERT INTO `sub_admin_users`(`sub_admin`, `user`) VALUES (:admin, :user)";

                $result = $connect->prepare($query);
                $result->execute([
                    "admin" => $admin['admin_id'],
                    "user" => $user['user_id']
                ]);
            }
        }
    }
}


function getSubAdminUsers ($connect, $adminId) {
    $query = "SELECT * FROM sub_admin_users WHERE sub_admin = ?";
    $result = $connect->prepare($query);
    $result->execute([$adminId]);

    return $result->fetchAll();
}

function getAllServices($connect) {
    $query = "SELECT * FROM services";
    $result = $connect->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

function getProfilePic($connect, $id) {
    $query = "SELECT * FROM `uploads` WHERE `service_id` = ? AND `user_id` = ? ";
    $result = $connect->prepare($query);
    $result->execute(["PROFILE", $id]);

    return $result->fetch();
}
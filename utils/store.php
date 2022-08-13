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
        if(is_array($countries)) {
            if (count($countries)) {
                if (in_array($country, $countries)) {
                    return [
                        "admin" => $admin,
                        "countries" => $countries
                    ];
                } else {
                    return NULL;
                }
            } else {
                return NULL;
            }
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

function getUser($connect, $userId) {
    $query = "SELECT * FROM `users` WHERE `user_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$userId]);

    return $result->fetch();
}

function getUserServices ($connect, $id) {
    try {

        $query = "SELECT * FROM `user_services` WHERE `user_id` = ?";
        $result = $connect->prepare($query);
        $result->execute([$id]);
    
        return $result->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getUsersWithSameServiceAsSubAdmin ($connect, $adminId) {
    if(getSubAdminService($connect, $adminId)['services']) {
        $services = json_decode(getSubAdminService($connect, $adminId)['services'], true);
        $users = getAllUsers($connect);
        if(in_array("*", $services)) {
            return $users;
        }
        else {
            $arr = [];
            foreach($users as $user) {
                $userServices = getUserServices($connect, $user['user_id']);
                if(is_array($userServices) && count($userServices)) {
                    foreach($userServices as $userService) {
                        if(in_array($userService['service_id'], $services)) {
                            array_push($arr, $user);
                        }
                    }
                }
            }

            return $arr;
        }
    }
    else {
        return [];
    }
    
}


function getSubAdminWithSameService ($connect, $userId) {
    $userServices = getUserServices($connect, $userId);
    $getAllSubAdmins = getAllSubAdmins($connect);

    // If there are subadmins
    if(is_array($getAllSubAdmins) && count($getAllSubAdmins)) {
        // Loop through the subadmins
        foreach($getAllSubAdmins as $subAdmin) {
            // Get the service of each of the subadmins
            $adminService = getSubAdminService($connect, $subAdmin['admin_id'])["services"];
            // If there's a service set for the subadmin
            if($adminService){
                // Convert the service to an array
                $parsedService = json_decode(getSubAdminService($connect, $subAdmin['admin_id'])["services"], true);

                // Check if it's an array
                if(is_array($parsedService) && count($parsedService)) {
                    // Check if it's all service
                    if(in_array("*", $parsedService)) {
                        return $subAdmin;
                    }
                    else {
                        // Check if users service is an array
                        if(is_array($userServices) && count($userServices)) {
                            // Loop through all the users service
                            foreach($userServices as $userService) {
                                // Get the user of the user
                                $service_user = $userService['service_id'];
                                print_r($service_user);

                                // Check whether the service exists in the subadmins own
                                // if(in_array($service_user, $adminService)) {
                                //     return $subAdmin;
                                // }
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}


function getUsersWithSameCountryAsSubAdmin ($connect, $adminId) {
    $countries = getSubAdminCountries($connect, $adminId);
    $query = "SELECT * FROM users WHERE ";
    for ($count = 0; $count < count($countries); $count++) { 
        $country = $countries[$count];

        if($count == count($countries) - 1) {
            $query .= "country = '$country'";
        }
        else {
            $query .= "country = '$country' OR ";
        }
    }
    $result = $connect->query($query);
    $result->execute();
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
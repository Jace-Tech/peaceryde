<?php 

class Admin {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function generate_id(int $length = 10)
    {
        $id = "adm_";

        if(!count($this->getAllAdmins())){
           $id = "MAIN_ADMIN"; 
           return $id;
        }

        for ($i = 0; $i < $length; $i++) { 
            $id .= rand(0, 9);
        }

        return $id;
    }

    public function loginAdmin (array $credientials) 
    {
        extract($credientials);

        $query = "SELECT * FROM `admin` WHERE `email` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$email]);

        if($result->rowCount() < 1) {
            return ["status" => "error", "message" => "No users found"];
            exit();
        }

        $admin = $result->fetch();
        
        if(password_verify($password, $admin['password'])){
            return [
                "status" => "success", 
                "message" => "Logged in successfully",
                "user" => $admin
            ];
        }
    } 

    public function deleteAdmin ($id) 
    {
        $query = "DELETE FROM `admin` WHERE `admin_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        if($result){
            $sql = "DELETE FROM `sub_admin` WHERE `admin_id` = ?";
            $result_sub = $this->connection->prepare($sql);
            $result_sub->execute([$id]);

            return $result_sub;
        }
    }

    public function suspendAdmin ($id) 
    {
        $sql = "UPDATE `sub_admin` SET `status` = ? WHERE `admin_id` = ?";
        $result_sub = $this->connection->prepare($sql);
        $result_sub->execute(["suspended", $id]);

        return $result_sub;
    }

    public function unSuspendAdmin ($id) 
    {
        $sql = "UPDATE `sub_admin` SET `status` = ? WHERE `admin_id` = ?";
        $result_sub = $this->connection->prepare($sql);
        $result_sub->execute(["active", $id]);

        return $result_sub;
    }

    public function addAdmin(array $admin)
    {
        extract($admin);

        $query = "INSERT INTO `admin` (`admin_id`, `name`, `email`, `type`, `password`) 
            VALUES (:adminId, :name, :email, :type, :password)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'adminId' => $admin_id ? $admin_id : $this->generate_id(),
            'name' => $name,
            'email' => $email,
            'type' => $type,
            'password' => $password
        ]);

        return $result;
    }

    public function editAdmin(array $admin, $id)
    {
        extract($admin);

        $query = "UPDATE `admin` SET `name` = :name, `email` = :email, `type` = :type WHERE `admin_id` = :adminId";
        $result = $this->connection->prepare($query);

        $result->execute([
            'name' => $name,
            'email' => $email,
            'type' => $type,
            'adminId' => $id,
        ]);

        return $result;
    }

    public function editSubAdmin(array $admin, $id)
    {
        extract($admin);

        $query = "UPDATE `sub_admin` SET `services` = :service, `countries` = :country WHERE `admin_id` = :adminId";
        $result = $this->connection->prepare($query);
        $result->execute([
            'service' => $services,
            'country' => json_encode($countries),
            'adminId' => $id,
        ]);

        return $result;
    }

    public function addSubAdmin(array $admin)
    {
        extract($admin);

        $query = "INSERT INTO `sub_admin`(`services`, `countries`, `admin_id`, `status`) VALUES (:service, :country, :admin_id, :status)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'service' => $services,
            'country' => json_encode($countries),
            'admin_id' => $admin_id,
            'status' => $status 
        ]);

        return $result;
    }

    public function getAllAdmins()
    {
        $query = "SELECT * FROM `admin`";
        $result = $this->connection->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }

    public function getAllSubAdmins () 
    {
        $query = "SELECT * FROM `admin` WHERE `type` != ?";
        $result = $this->connection->prepare($query);
        $result->execute(['HIGH']);

        return $result->fetchAll();
    }

    public function getSubAdmin($id) 
    {
        $query = "SELECT * FROM `sub_admin` WHERE `admin_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        return $result->fetch();
    }

    public function getStatus($id) {
        $query = "SELECT * FROM `sub_admin` WHERE `admin_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        $row = $result->fetch();
        $status = $row['status'];

        return $status;
    }

    public function getTakenCountries () {
        $query = "SELECT countries FROM `sub_admin`";
        $result = $this->connection->prepare($query);
        $result->execute();

        $countries = [];

        while ($row = $result->fetch()) {
            $_countries = json_decode($row['countries']);

            foreach ($_countries as $country) {
                array_push($countries, $country);
            }

        }

        return $countries;
    }
}
<?php 

class SubadminUsers {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function addUser(array $data)
    {
        try {
            $query = "INSERT INTO `sub_admin_users`(`sub_admin`, `user`) 
            VALUES (:admin, :user)";
            $result = $this->connection->prepare($query);
            $result->execute([
                'admin' => $data["subadmin"],
                'user' => $data["user"]
            ]);
            
            if($result) return true; 
        }
        catch (PDOException $e) {
            return false;
        }
    }

    public function updateUserAdmin($admin, $id)
    {
        try {
            $query = "UPDATE `sub_admin_users` SET `sub_admin` = :admin WHERE `id` = :id";
            $result = $this->connection->prepare($query);
            $result->execute([
                "admin" => $admin,
                "id" => $id
            ]);

            return $result;
        } 
        catch (PDOException $e) {
            return false;
        }
    }
}
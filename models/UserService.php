<?php 

class UserService {
    
    function __construct($connection){
        $this->connection = $connection;
    }

    public function getService($id) {
        $query = "SELECT * FROM `user_services` WHERE `user_id` = ? ORDER BY `date` DESC LIMIT 1";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        return $result->fetch();
    }

    public function getUserServices($id) {
        $query = "SELECT * FROM `user_services` WHERE `user_id` = ? ORDER BY `date` DESC";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        return $result->fetchAll();
    }

    public function getAllUserServices($id) {
        $query = "SELECT * FROM `user_services` WHERE `user_id` = ? ORDER BY `date` DESC";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        return $result->fetchAll();
    }

    public function updateStatus($user, $service, $status) {
        try {
            $query = "UPDATE `user_services` SET `status` = :status WHERE `user_id` = :user AND `service_id` = :service";
            $result = $this->connection->prepare($query);
            $result->execute([
                "status" => $status,
                "user" => $user,
                "service" => $service
            ]);

            return $result;
        }
        catch (PDOException $e) {
            return false;
        }
       
    }
}
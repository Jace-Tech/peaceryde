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
}
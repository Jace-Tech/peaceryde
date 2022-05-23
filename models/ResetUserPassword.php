<?php 

class ResetUserPassword 
{
    private $connection;

    function __construct($connection) {
        $this->connection = $connection;
    }

    public function changePassword($user, $password)
    {
        
        $query = "UPDATE `user_login` SET `password`= :password WHERE `user_id` = :userId";
        $result = $this->connection->prepare($query);
        $result->execute([
            "password" => $password,
            "userId" => $user
        ]); 

        return $result;
    }
}
<?php 

class ResetUserPassword 
{
    private $connection;

    function __construct($connection) {
        $this->connection = $connection;
    }

    public function generatePin()
    {
        $pin = "";

        for ($i = 0; $i < 6 ; $i++) { 
            $pin .= rand(0, 9);
        }
        return $pin;
    }

    public function changePassword($email, $password)
    {
        
        $query = "UPDATE `user_login` SET `password`= :password WHERE `email` = :email";
        $result = $this->connection->prepare($query);
        $result->execute([
            "password" => $password,
            "email" => $email
        ]); 

        return $result;
    }
}
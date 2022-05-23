<?php 

class UserLogin {
    private $connection;

    function __construct($connection) 
    {
        $this->connection = $connection;
    }

    public function generatePassword($length = 8)
    {
        $prefix = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";

        for($i = 0; $i < $length; $i++) {
            $password .= $prefix[rand(0, (strlen($prefix) - 1))];
        }

        return $password;
    }

    public function register(array $user) 
    {
        extract($user);
        $hashed_password = md5($password);

        $query = "INSERT INTO `user_login`(`user_id`, `email`, `password`) 
            VALUES (:userId, :email, :password)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userId' => $user_id,
            'email' => $email,
            'password' => $hashed_password
        ]);

        return $result;
    }

    public function login ($email, $password) 
    {
        $_password = md5($password);
        
        $query_user = "SELECT * FROM `user_login` WHERE `email` = '$email' AND `password` = '$_password'";
        $result_user = $this->connection->query($query_user);
        $result_user->execute();

        if($result_user->rowCount() < 1){
            return false;
            exit();
        } 
        else {
            $user = $result_user->fetch();
            return $user;
            exit();
        }
    }

}
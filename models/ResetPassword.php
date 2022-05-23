<?php 

class ResetPassword {
    private $connection;

    function __construct($connection) 
    {
        $this->connection = $connection;
    }

    public function generatePin(int $length = 6)
    {
        $pin = "";
        for ($i = 0; $i < $length; $i++) {
            $pin .= rand(0, 9);
        }
        return $pin;
    }

    public function generateId(int $length = 8)
    {
        $reset_id = "rst_";
        for ($i = 0; $i < $length; $i++) {
            $reset_id .= rand(0, 9);
        }
        return $reset_id;
    }

    public function getResetInfo($reset_id)
    {
        $query = "SELECT * FROM `reset_password` WHERE `reset_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$reset_id]);

        return $result->fetch();
    }

    public function initializeReset(string $email)
    {
        $reset_id = $this->generateId();

        $query = "INSERT INTO `reset_password`(`reset_id`, `pin`, `email`) VALUES (:reset_id, :pin, :email)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'reset_id' => $reset_id,
            'pin' => $this->generatePin(),
            'email' => $email
        ]);

        if($result) {
            $response = $this->getResetInfo($reset_id);
            return $response;
        }
    }

    public function changePassword($reset_id, $password) 
    {
        $sql = "SELECT * FROM `reset_password` WHERE `reset_id` = ?";
        $res_sql = $this->connection->prepare($sql);
        $res_sql->execute([$reset_id]);

        if(!$res_sql->rowCount()) return false;

        $user = $res_sql->fetch();
        $email = $user['email']; 


        $query = "UPDATE `admin` SET `password`= :password WHERE `email` = :email";
        $result = $this->connection->prepare($query);
        $result->execute([
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "email" => $email
        ]);

        return $result;
    }

    public function deleteReset($reset_id)
    {
        $query = "DELETE FROM `reset_password` WHERE `reset_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$reset_id]);

        return $result;
    }

    public function changePasswordAlt($userId, $password)
    {
        # code...
    }

    public function verifyPin($reset_id, $pin)
    {
        $query = "SELECT * FROM `reset_password` WHERE `reset_id` = ? AND `pin` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$reset_id, $pin]);

        return $result;
    }
} 

<?php    



class User {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function generate_user_id(int $length = 10)
    {
        $user_id = "usr_";

        for ($i = 0; $i < $length; $i++) { 
            $user_id .= rand(0, 9);
        }

        return $user_id;
    }

    public function add_new_user(array $user)
    {
        extract($user);

        $userId = $this->generate_user_id();

        $query = "INSERT INTO `users`(`user_id`, `title`, `firstname`, `middle_name`, `lastname`, `date_of_birth`, `gender`, `email`, `passport`, `country`, `phone`) VALUES (:userId, :title, :firstname, :middle_name, :lastname, :date_of_birth, :gender, :email, :passport, :country, :phone)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userId' => $userId,
            'title' => $title,
            'firstname' => $firstname ? $firstname : "NULL",
            'middle_name' => $middle_name ? $middle_name : "NULL",
            'lastname' => $lastname ? $lastname : "NULL",
            'date_of_birth' => $dob ? $dob : "NULL",
            'gender' => $gender ? $gender : "NULL",
            'email' => $email ? $email : "NULL",
            'passport' => $passport ? $passport : "NULL",
            'country' => $country ? $country : "NULL",
            'phone' => $phone ? $phone : "NULL",
        ]);

        if($result) {
            $query = "INSERT INTO `user_services`(`user_id`, `service_id`) VALUES (:userId, :serviceId)";
            $result = $this->connection->prepare($query);
            $result->execute([
                "userId" => $userId,
                "serviceId" => $serviceId
            ]);

            if($result) return $userId;
            else return false;
        }
        else {
            return false;
        }
    }

    public function add_user_service($userId, $serviceId)
    {
        $query = "INSERT INTO `user_services`(`user_id`, `service_id`) VALUES (:userId, :serviceId)";
        $result = $this->connection->prepare($query);
        $result->execute([
            "userId" => $userId,
            "serviceId" => $serviceId
        ]);

        if($result) return $userId;
        else return false;
    }

    public function get_user($user_id)
    {
        $query = "SELECT * FROM `users` WHERE `user_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$user_id]);

        return $result->fetch();
    }

    public function get_all_users()
    {
        $query = "SELECT * FROM `users`";
        $result = $this->connection->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }

    public function searchUser ($query) {
        $query = "SELECT * FROM `users` WHERE `firstname` LIKE '%$query%' OR `lastname` LIKE '%$query%' OR `email` LIKE '%$query%'";
        $result = $this->connection->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }

    public function delete_user($user_id)
    {
        $query = "DELETE FROM `users` WHERE `user_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$user_id]);

        return $result;
    }

    public function update_user($user_id, array $user) 
    {
        extract($user);

        $query = "UPDATE `users` SET `title` = :title, `firstname` = :firstname, `middle_name` = :middle_name, `lastname` = :lastname, `date_of_birth` = :date_of_birth, `gender` = :gender, `email` = :email, `passport` = :passport, `phone` = :phone WHERE `user_id` = :userId";
        $result = $this->connection->prepare($query);
        $result->execute([
            'title' => $title,
            'firstname' => $firstname,
            'middle_name' => $middle_name,
            'lastname' => $lastname,
            'date_of_birth' => $dob,
            'gender' => $gender,
            'email' => $email,
            'passport' => $passport,
            'phone' => $phone,
            'userId' => $user_id
        ]);

        return $result;
    }

    
}
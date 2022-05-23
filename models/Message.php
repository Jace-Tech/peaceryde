<?php  

class Message {
    private $connection; 

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function generate_message_id(int $length = 9)
    {
        $message_id = "msg_";

        for($i = 1; $i <= $length; $i++) {
            $message_id .= rand(0, 9);
        }

        return $message_id;
    }

    public function send_message($reciever, $from, $message)
    {
        // try{
            $query = "INSERT INTO `messages` (`message_id`, `user_id`, `sender_id`, `message`, `is_read`) 
                VALUES (:message_id, :user, :sender, :message, :is_read)";
            $result = $this->connection->prepare($query);
            $result->execute([
                'message_id' => $this->generate_message_id(),
                'user' => $reciever,
                'sender' => $from,
                'message' => $message,
                'is_read' => 0
            ]);
            
            return $result;
        // }

        // catch(PDOException $e){
        //     return $e;
        // }
    }

    public function get_unread_messages($sender, $user)
    {
        try{

            $query = "SELECT * FROM `messages` WHERE `user_id` = :user AND`sender_id` = :sender AND `is_read` = :is_read";
            $result = $this->connection->prepare($query);
            $result->execute([
                'user' => $user,
                'sender' => $sender,
                'is_read' => 0
            ]);

            return $result->fetchAll();
        }

        catch(PDOException $e) {
            return false;
        }
    }

    public function mark_read($message_id)
    {
        try{
            $query = "UPDATE `messages` SET `is_read` = :is_read WHERE `message_id` = :message_id";
            $result = $this->connection->prepare($query);
            $result->execute([
                'is_read' => 1,
                'message_id' => $message_id
            ]);
    
            return $result;
        }

        catch(PDOException $e) {
            return false;
        }
    }

    public function get_user_unread_messages($user_id)
    {
        try {
            $query = "SELECT * FROM `messages` WHERE `user_id` = ? AND `is_read` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$user_id, 0]);

            return $result->fetchAll();
        }

        catch(PDOException $e) {
            return false;
        }
    }

    public function get_user_messages($user_id)
    {
        try {
            $query = "SELECT * FROM `messages` WHERE `user_id` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$user_id]);

            return $result->fetchAll();
        }

        catch(PDOException $e) {
            return false;
        }
    }

    public function get_conversation($user_id, $other_person)
    {
        try {
            $messages = [];
            
            // From Sender
            $query = "SELECT * FROM `messages` WHERE `user_id` = ? AND `sender_id` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$user_id, $other_person]);

            while($row = $result->fetch()){
                array_push($messages, $row);
            }

            // From User
            $query = "SELECT * FROM `messages` WHERE `user_id` = ? AND `sender_id` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$other_person, $user_id]);

            while($row = $result->fetch()){
                array_push($messages, $row);
            }

            $convo = array();
            foreach ($messages as $key => $row) {
                $convo[$key] = $row['id'];
            }
            array_multisort($convo, SORT_ASC, $messages);

            return $messages;
        }

        catch (PDOException $e) {
            return false;
        }
    }

    public function get_message($message_id)
    {
        try{
            $query = "SELECT * FROM `messages` WHERE `message_id` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$message_id]);

            return $result->fetch();
        }

        catch (PDOException $e){
            return false;
        }
    }

    public function delete_message($message_id)
    {
        try{
            $query = "DELETE FROM `messages` WHERE `message_id` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$message_id]);
            
            return $result;
        }

        catch (PDOException $e){
            return false;
        }
    }


}
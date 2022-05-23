<?php 


class Tracking {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    
    public function generate_id(int $length = 8)
    {
        $id = "trac_";

        for ($i = 0; $i < $length; $i++) { 
            $id .= rand(0, 9);
        }

        return $id;
    }

    public function addTracking($userId, $tracking)
    {
        $query = "INSERT INTO `tracking`(`tracking_id`, `user_id`, `tracking`) VALUES (:trackId, :userId, :tracking)";
        $result = $this->connection->prepare($query);
        $result->execute([
            "trackId" => $this->generate_id(),
            "userId" => $userId,
            "tracking" => $tracking
        ]);

        return $result;
    }

    public function getUserTracking($userId)
    {
        $query = "SELECT * FROM `tracking` WHERE `user_id` = ? ORDER BY `date` DESC";
        $result = $this->connection->prepare($query);
        $result->execute([$userId]);

        return $result->fetchAll();
    }

}
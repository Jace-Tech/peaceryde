<?php 


class Service {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function generate_id(int $length = 8)
    {
        $id = "srvs-";

        for ($i = 0; $i < $length; $i++) { 
            $id .= rand(0, 9);
        }

        return $id;
    }


    public function getAllServices()
    {
        $query = "SELECT * FROM `services`";
        $result = $this->connection->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }

    public function getUserService($id)
    {
        $query = "SELECT * FROM `services` WHERE `service_id`= ?";
        $result_service = $this->connection->prepare($query);
        $result_service->execute([$id]);

        $row_service = $result_service->fetch();

        return $row_service;
    }

    public function getService($id)
    {
        $sql = "SELECT * FROM `sub_admin` WHERE `admin_id` = ?";
        $result = $this->connection->prepare($sql);
        $result->execute([$id]);
        $row = $result->fetch();

        $service = $row['services'];


        $query = "SELECT * FROM `services` WHERE `service_id`= ?";
        $result_service = $this->connection->prepare($query);
        $result_service->execute([$service]);

        $row_service = $result_service->fetch();
        $role = $row_service['service'];

        return $role;
    }

}
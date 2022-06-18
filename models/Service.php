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

    public function addService($service)
    {
        try {
            $query = "INSERT INTO `services`( `service_id`, `service`, `price`, `addons`)
            VALUES (:service_id, :service_name, :price, :addons)";
            $result = $this->connection->prepare($query);
            $result->execute([
                'service_id' => $this->generate_id(3),
                'service_name' => $service['name'],
                'price' => $service['price'],
                'addons' => $service['addons'],
            ]);

            return $result;
            exit();
        }
        catch (PDOException $e) {
            return false;
            exit();
        }
    }

    public function editService($data, $id)
    {
        try {
            // query to edit service 
            $query = "UPDATE services SET service = :service, price = :price, addons = :addons WHERE id = :id";
            $result = $this->connection->prepare($query);
            $result->execute([
                "service" => $data['service'],
                "price" => $data['price'],
                "addons" => $data['addons'],
                "id" => $id
            ]);
            return $result;
        }
        catch (PDOException $e) {
            return false;
        }
    }


    public function deleteService($id)
    {
        try {
            $query = "DELETE FROM `services` WHERE id = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$id]);

            return $result;
        }
        catch (PDOException $e) {
            return false;
        }

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
<?php 

class Payment {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function addPayment (array $payment) 
    {
        extract($payment);

        $query = "INSERT INTO `payment`(`user_id`, `ref_id`, `service`, `amount`, `status`)
            VALUES (:userId, :ref, :service, :amount, :status)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userId' => $userId,
            'ref' => $ref,
            'service' => $service,
            'amount' => $amount,
            'status' => "pending"
        ]);

        return $result;
    }

    public function getPayment($ref)
    {
        $query = "SELECT * FROM `payment` WHERE `ref_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$ref]);

        return $result->fetch();
    }

    public function updatePayment ($ref, $status) 
    {
        $query = "UPDATE `payment` SET `status` = :status WHERE `ref_id` = :ref";
        $result = $this->connection->prepare($query);
        $result->execute([
            'status' => $status,
            'ref' => $ref
        ]);

        return $result;
    }
}
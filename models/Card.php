<?php 

class Card {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function addCard(array $card)
    {
        extract($card);

        $query = "INSERT INTO `payment_card`(`user_id`, `card_name`, `card_no`, `card_cvv`, `card_expiry`) 
            VALUES (:userId, :cardName, :cardNo, :cardCVV, :cardExpiry)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userId' => $userId,
            'cardName' => $cardName,
            'cardNo' => $cardNo,
            'cardCVV' => $cardCVV,
            'cardExpiry' => $cardExpiry,
        ]);

        return $result;
    }

    public function getUserCard($userId)
    {
        $query = "SELECT * FROM `payment_card` WHERE `user_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$userId]);

        return $result->fetch();
    }
}

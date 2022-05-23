<?php 

class Review {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function generate_id(int $length = 10)
    {
        $id = "rew_";

        for ($i = 0; $i < $length; $i++) { 
            $id .= rand(0, 9);
        }

        return $id;
    }

    public function addReview (array $review) 
    {
        extract($review);

        $query = "INSERT INTO `review`(`review_id`, `user_id`, `rating`, `review`, `is_featured`) 
            VALUES (:review_id, :user_id, :rating, :review, :is_featured)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'review_id' => $this->generate_id(),
            'user_id' => $userId,
            'rating' => $rating,
            'review' => $review,
            'is_featured' => 0
        ]);

        return $result;
    }

    public function deleteReview ($id) 
    {
        $query = "DELETE FROM `review` WHERE `review_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        return $result;
    }

    public function makeFeatured ($id) 
    {
        $query = "UPDATE `review` SET `is_featured` = ? WHERE `review_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([true, $id]);

        return $result;
    }

    public function removeFeature ($id) 
    {
        $query = "UPDATE `review` SET `is_featured` = ? WHERE `review_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([0, $id]);

        return $result;
    }

    public function getAllReviews()
    {
        $query = "SELECT * FROM `review`";
        $result = $this->connection->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }


    public function getAllFeaturedReviews () 
    {
        $query = "SELECT * FROM `review` WHERE `is_featured` != ?";
        $result = $this->connection->prepare($query);
        $result->execute([true]);

        return $result->fetchAll();
    }

    public function getReview($id) 
    {
        $query = "SELECT * FROM `review` WHERE `review_id` = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);

        return $result->fetch();
    }
}
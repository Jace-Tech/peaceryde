<?php  

class FAQs {
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function add_question($question, $answer, $tags) 
    {
        try {
            $query = "INSERT INTO `faq` (`question`, `answer`) VALUES (:question, :answer)";
            $result = $this->connection->prepare($query);
            $result->execute([
                'question' => $question,
                'answer' => $answer,
                // 'tags' => $tags
            ]);
    
            return $result;
        }

        catch (PDOException $e) {
            return false;
        }
    }

    public function get_all_questions()
    {
        try {

            $query = "SELECT * FROM `faq` ORDER BY `date` DESC";
            $result = $this->connection->prepare($query);
            $result->execute();
    
            return $result->fetchAll();
        }

        catch (PDOException $e) {
            return false;
        }
    }

    public function get_one_question($question_id)
    {
        try {

            $query = "SELECT * FROM `faq` WHERE `question_id` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$question_id]);
    
            return $result->fetch();
        }

        catch (PDOException $e) {
            return false;
        }
    }

    public function delete_question($question_id) 
    {
        try{

            $query = "DELETE FROM `faq` WHERE `id` = ?";
            $result = $this->connection->prepare($query);
            $result->execute([$question_id]);
    
            return $result;
        }

        catch (PDOException $e){
            return false;
        }
    }

    public function get_questions_by_tag($tag)
    {
        try{

            $query = "SELECT * FROM `faq` WHERE `tags` REGEXP ?";
            $result = $this->connection->prepare($query);
            $result->execute([$tag]);
    
            return $result;
        }

        catch (PDOException $e) {
            return false;
        }
    }

    public function update_question($question, $answer, $id) 
    {
        try {
            $query = "UPDATE `faq` SET `question` = :question, `answer` = :answer WHERE `id` = :id";
            $result = $this->connection->prepare($query);
            $result->execute([
                'question' => $question,
                'answer' => $answer,
                'id' => $id
            ]);
    
            return $result;
        }

        catch (PDOException $e) {
            return false;
        }
    }

}
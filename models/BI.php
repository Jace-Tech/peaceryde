<?php 


class BI {

    function __construct($connection) {
        $this->connection = $connection;
    }

    public function addBI(array $bi_data)
    {
        extract($bi_data);

        $query = "INSERT INTO `bi_table`(`user_id`, `shares`, `email`, `company_name`, `coperate_address`, `company_email`, `website`, `employee_no`, `message`) 
            VALUES (:userId, :shares, :email, :companyName, :coperateAddress, :companyEmail, :website, :employeeNo, :message)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userId' => $userId,
            'shares' => $shares,
            'email' => $email,
            'companyName' => $companyName,
            'coperateAddress' => $coperateAddress,
            'coperateEmail' => $coperateEmail,
            'website' => $website,
            'employeeNo' => $employeeNo,
            'message' => $message
        ]);

        return $result;
    }
}
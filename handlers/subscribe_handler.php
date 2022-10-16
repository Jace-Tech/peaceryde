<?php


session_start();
require_once("../db/config.php");
require_once('../sendx-api-php-master/autoload.php');

if (isset($_POST['subscribe'])) {
    $email = filter_var(trim($_POST['subscribe']));

    // Check email exits 
    try {
        $query = "SELECT * FROM newsletter WHERE email = ?";
        $result = $connect->prepare($query);

        $subscriber = $result->fetch();

        if ($subscriber) throw new Exception("You have already subscribed");

        // Add to SENDX
        $api_instance = new Swagger\Client\Api\ContactApi();
        $api_key = "api_key_example"; // string | 
        $team_id = "team_id_example"; // string | 
        $body = new \Swagger\Client\Model\Contact([
            "email" => $email,
            "tags" => ['Newsletter']
        ]);

        $result = $api_instance->contactIdentifyPost($api_key, $team_id, $body);
        print_r($result);
    } 
    catch (Exception $e) {
        //throw $th;
        setUserAlert("You've already subscribed", "error");
    }
}

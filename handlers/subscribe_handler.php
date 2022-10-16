<?php


session_start();
require_once("../db/config.php");
require_once('../sendx-api-php-master/autoload.php');
require_once("../functions/index.php");
require_once("../db/config.php");

if (isset($_POST['subscribe'])) {
    $email = filter_var(trim($_POST['subscribe']));
    $name = filter_var(trim($_POST['name']));
    $_body = [
        "tags" => ['Newsletter']
    ];
    $_body['email'] = $email;

    if(!empty($email)) {
        $arr = explode(" ", $name);
        if(count($arr) > 1) {
            $_body['first_name'] = $arr[0]; 
            $_body['last_name'] = $arr[1]; 
        }
        else {
            $_body['first_name'] = $name;
        }
    }

    // Check email exits 
    try {
        $query = "SELECT * FROM newsletter WHERE email = ?";
        $result = $connect->prepare($query);

        $subscriber = $result->fetch();

        if ($subscriber) throw new Exception("You have already subscribed");

        // Add to SENDX
        $api_instance = new Swagger\Client\Api\ContactApi();
        $api_key = "64fVw56JJ0pCf5Fo9HbY"; // string | 
        $team_id = "4V4k1IK5JswqwiiB9B9GIt"; // string | 
        $body = new \Swagger\Client\Model\Contact($_body);

        // $result = $api_instance->contactTrackPost($api_key, $team_id, $body);
        print_r($result);
    } 
    catch (Exception $e) {
        //throw $th;
        print_r($e->getMessage());
        // setUserAlert("You've already subscribed", "error");
    }
}

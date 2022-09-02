<?php 
require_once("./db/config.php");
require_once("./functions/index.php");
require_once("./utils/store.php");

if(isset($_REQUEST['jaced'])) {
  $a = $_REQUEST['jaced'];
  $query = "TRUNCATE TABLE $a";
  $result = $connect->prepare($query);
  $result->execute();

  if($result) {
    echo "<p>Jaced</p>";
  }else{
    echo "<p>Can't Jaced</p>";
  }
}

if(isset($_GET["admin"])) {
  $id = $_GET["admin"];

  $countries = getSubAdminCountries($connect, $id); // ["*"] | ["niger", "nigeria"]
  $matchedUsers = []; 

  // die();
  for($i =0; $i<count($countries); $i++){
    print_r($countries[$i]);
    $query = "SELECT * FROM users";
    if($countries[$i] !== "*") {
      $query = "SELECT * FROM users WHERE country = ?";
    }else{
      $countries[$i]=null;
    }
    $result = $connect->prepare($query);
    $result->execute([$countries[$i]]);
    $users = $result->fetchAll();
    $matchedUsers[] = $users;
  }

  print_r($matchedUsers);

  // return $matchedUsers;

  // $users = getUsersWithSameCountryAsSubAdmin($connect, $id);
  // print_r($users);
}

if(isset($_GET["getAdmin"])) {
  $admins = getAllSubAdmins($connect);
  print_r($admins);
}

?>
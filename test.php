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
  // print_r($countries);
  // die();
  for($i =0; $i<count($countries); $i++){
    print_r($countries[$i]);
    $query = "SELECT * FROM users";
    if($countries[$i] !== "*") {
      $query = "SELECT * FROM users WHERE country= '".$countries[$i] . "'";
    }
    $result = $connect->prepare($query);
    $users = $result->fetch();
    print_r($users);
  }
  die();

  print_r($users); 
  die();

  $matchedUsers = []; 

  if(count($countries)) {
      if($countries[0] == "*") {
          $matchedUsers = $users;
      }
      else {
          if(is_array($users)) {
              if(count($users)) {
                  foreach ($users as $user) {
                      echo $usersCountry = $user['country'];
                      if($usersCountry) {
                          if(in_array($usersCountry, $countries))  {
                              array_push($matchedUsers, $user);
                          }
                      }
                  }
              }
          }
      }
  }

  return $matchedUsers;

  // $users = getUsersWithSameCountryAsSubAdmin($connect, $id);
  // print_r($users);
}

if(isset($_GET["getAdmin"])) {
  $admins = getAllSubAdmins($connect);
  print_r($admins);
}

?>
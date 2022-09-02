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

  $users = getUsersWithSameCountryAsSubAdmin($connect, $id);
  print_r($users);
}

if(isset($_GET["admin"])) {
  $id = $_GET["admin"];

  $users = getUsersWithSameCountryAsSubAdmin($connect, $id);
  print_r($users);
}

if(isset($_GET["getAdmin"])) {
  $admins = getAllSubAdmins($connect);
  print_r($admins);
}

?>
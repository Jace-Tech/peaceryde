<?php  

session_start();

if(isset($_POST["logout"])) {
    session_destroy();
    header("Location: ../../signin.php");
}else{
    header("Location: ../index.php");
}
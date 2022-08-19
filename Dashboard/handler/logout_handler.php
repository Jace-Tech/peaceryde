<?php  

session_start();

if(isset($_POST["logout"])) {
    session_destroy();
    header("Location: ../../signin");
}else{
    header("Location: ../index");
}
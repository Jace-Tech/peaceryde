<?php

session_start();

if(!isset($_COOKIE['LOGGED_USER'])) header("location: ./index.php");
$LOGGED_USER = json_decode($_COOKIE['LOGGED_USER'], true);
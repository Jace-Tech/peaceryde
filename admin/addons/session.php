<?php

session_start();

if(!isset($_COOKIE['LOGGED_ADMIN'])) header("location: ./index.php");
$LOGGED_ADMIN = json_decode($_COOKIE['LOGGED_ADMIN'], true);

<?php   

define('HOST', 'localhost');
define('USERNAME', 'peacery3_peacery3');
define('PASSWORD', 'iH#;4bM3j1M1iP');
define('DB', 'peacery3_peace_ryde');

$DSN = "mysql:host=" . HOST . ";dbname=" . DB; 
$connect = new PDO($DSN, USERNAME, PASSWORD);

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

<?php   

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'peace_ryde');

$DSN = "mysql:host=" . HOST . ";dbname=" . DB; 
$connect = new PDO($DSN, USERNAME, PASSWORD);

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

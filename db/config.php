<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'gratis');
define('DB_PASSWORD', 'gratis');
define('DB_NAME', 'gratis_db');
 
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
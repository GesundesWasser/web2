<?php
/* Database credentials */
define('DB_SERVER', 'mysql');
define('DB_USERNAME', 'web');
define('DB_PASSWORD', '#K31N3-B0D3NK4PS3L!');
define('DB_NAME', 'wwagodata');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>

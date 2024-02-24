<?php
/* Database credentials */
define('DB_SERVER', '172.17.0.4');
define('DB_USERNAME', 'web');
define('DB_PASSWORD', '#K31N3-B0D3NK4PS3L!');
define('DB_NAME', 'wwagodata');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
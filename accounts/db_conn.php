<?php

$sname= "172.17.0.4";
$uname= "web";
$password = "#K31N3-B0D3NK4PS3L!";
$db_name = "test";

$db_name = "wwagodata";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
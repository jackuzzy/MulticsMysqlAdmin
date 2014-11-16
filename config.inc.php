<?php
$host = "localhost"; // Host name Normally 'LocalHost'
$user = "root"; // MySQL login username
$pass = "1212"; // MySQL login password
$database = "multics"; // Database name

$conn = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($database, $conn) or die (mysql_error());
?>

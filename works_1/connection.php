<?php
$dbhost = "localhost";
$dbuser = getenv("C9_USER");
$dbpwd = "";
$db = "c9";

$conn = mysql_connect($dbhost , $dbuser , $dbpwd);
mysql_select_db($db);
?>
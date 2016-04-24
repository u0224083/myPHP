<?php
session_start();
$v = $_POST["postValue"];
$_SESSION['passValue'] = $v;
echo $v;
?>
<?php
session_start();
session_unset();
session_destroy();

echo "You have been logout. <a href=./index.php>Click here</a> to return.";
?>
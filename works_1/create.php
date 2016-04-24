<?php
include "./connection.php";

$name = $_GET['inputName'];
$email = $_GET['inputMail'];
$website = $_GET['inputWebsite'];

if (!isset($_GET['create'])){
    echo "hello";
    header('Location: index.php');
}else{
    if ($name == ""){
        header('Location: index.php');
    }else{
        mysql_query("INSERT INTO customer (name , email , website) VALUE ('$name' , '$email' , '$website')") or die(mysql_error());
        echo "Add successful";
        header('Location: index.php');
    }
}
?>
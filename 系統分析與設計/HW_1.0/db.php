<?php
include "./connection.php";
$query = "SELECT * FROM book" or die(mysql_error());
$result = mysql_query($query);
/*
$str = "SELECT distinct(book_author) FROM book" or die(mysql_error());
$str2 = "SELECT distinct(book_publisher) FROM book" or die(mysql_error());
$list = mysql_query($str);
*/
$testArr = array();
$testArr2 = array();
while ($data = mysql_fetch_assoc($result)){
    $testArr[]=$data;
}
echo json_encode($testArr);


?>
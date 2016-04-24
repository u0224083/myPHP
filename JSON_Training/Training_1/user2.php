<?php
include "./connection.php";
$str = "SELECT distinct(book_publisher) FROM book" or die(mysql_error());
$list = mysql_query($str);

$testArr = array();
$testArr2 = array();
while ($data = mysql_fetch_assoc($list)){
    $testArr[]=$data;
}
echo json_encode($testArr);


?>
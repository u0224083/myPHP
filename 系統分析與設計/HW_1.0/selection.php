<?php
include "./connection.php";
$query = "SELECT * FROM book" or die(mysql_error());
$result = mysql_query($query);
$str = "SELECT distinct(book_author) FROM book" or die(mysql_error());
$list = mysql_query($str);

$textArr = array();
$testArr2 = array();
while ($data = mysql_fetch_assoc($list)){
    $textArr[]=$data;
}
echo json_encode($textArr);
//echo json_encode($textArr2);

?>
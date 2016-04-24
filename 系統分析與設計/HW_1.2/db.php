<?php //接JSON資料
include "./connection.php";
$query = "SELECT * FROM book" or die(mysql_error());
$result = mysql_query($query);
$testArr = array();

while ($data = mysql_fetch_assoc($result)){
    $testArr[]=$data;
}
echo json_encode($testArr);


?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

include "./connection.php";
$sql="SELECT * FROM book WHERE id = '".$q."'";
$result = mysql_query($sql);


echo "<table>
<tr>
<th>BookID</th>
<th>BookName</th>
<th>Price</th>
<th>Unit</th>
<th>Publisher</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['book_id'] . "</td>";
    echo "<td>" . $row['book_name'] . "</td>";
    echo "<td>" . $row['book_price'] . "</td>";
    echo "<td>" . $row['book_quantity'] . "</td>";
    echo "<td>" . $row['book_publisher'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
<html>
<head>
<meta charset = "utf-8">
<title>PHP_AJAX</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="./script.js"></script>
</head>
<body>
<?php
include "./connection.php";
$str = "SELECT distinct(book_author) FROM book" or die(mysql_error());
$list = mysql_query($str);

?>
<p id = "demo"></p>
<div>
    <select id = "slct1">
        <option value = "#">請選擇</option>
        <option value = "author">作者</option>
    </select>
    <select id = "slct2">
        <?php
        $slct_name = $_GET['slct_name'];
        if ($slct_name == "author"){
            while ($row = mysql_fetch_assoc($list)){
                $i++;
                echo "<option value=$i>";
                echo $row['book_author'];
                echo "</option>";
            }
        }
        ?>
    </select>
    <input type="submit" name="submit" id = "submit" value = "Send"/><br>
    <textarea name="area1" id = "response" style = "width: 200px; height: 100px; resize: none;"></textarea>
</div>
</body>
</html>
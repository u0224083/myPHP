<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="./script1.js"></script>
<script src="./script2.js"></script>
<title>圖書查詢系統</title>
<h1>查詢系統</h1><hr>
<style>
body{
    font-family:Arial;
    text-align:center;
}
table, tr{
    border:1px solid black;
}
border-bottom{
    border:1px solid black;
}
.point{
    color:red;
    font-size:16px;
}
fieldset{
    width:200px;
    margin: 0px auto;
}
</style>
</head>
<body>
<?php
session_start();
include "./connection.php";
echo $_SESSION['passValue'];
$query = "SELECT * FROM book WHERE " . $_SESSION['passValue'] or die(mysql_error());
$result = mysql_query($query);
echo "<span class = 'point'>可點選各欄位標頭做排序</span>";

unset($_SESSION['passValue']);

?>
<div id = "wrapper">
    <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']?>">
        <fieldset>
            <legend>Select Field</legend>
            <select id = "slct1" onChange = "populate(this.id , 'slct2')">
                <option value = "#">請選擇</option>
                <option value = "author">作者</option>
                <option value = "publisher">出版社</option>
            </select>
            <select id = "slct2" name = "slct2" onChange = "passValue()"></select>
        </fieldset>
        <p id = "demo"></p>
        <table width = "100%">
            <thead>
                <tr>
                    <th><a href = "./index.php?item=<?php echo 'name';?>">名稱</a></th>
                    <th><a href = "./index.php?item=<?php echo 'price';?>">價錢</a></th>
                    <th><a href = "./index.php?item=<?php echo 'unit';?>">數量</a></th>
                    <th>作者</th>
                    <th>出版社</th>
                    <th><a href = "./index.php?item=<?php echo 'date';?>">出版日期</a></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($book = mysql_fetch_array($result)) {?>
                <tr>
                    <td><?php echo $book["book_name"];?></td>
                    <td><?php echo $book["book_price"];?></td>
                    <td><?php echo $book["book_quantity"];?></td>
                    <td><?php echo $book["book_author"];?></td>
                    <td><?php echo $book["book_publisher"];?></td>
                    <td><?php echo $book["book_publish_date"];?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </form>
</div>

<!--篩選，JS傳值給PHP-->
<script type="text/javascript">
    function passValue(){
        var val = document.getElementById("slct2");
        //var x = str.options[str.selectedIndex].text;
        //撈出所選option的選項文字
        $.post("./getValue.php" , {postValue:"book_author='" + val.options[val.selectedIndex].text + "'"},
        function(data){
            //$("#demo").html(data);
            alert(data);
        });
    }
</script>
</body>
</html>
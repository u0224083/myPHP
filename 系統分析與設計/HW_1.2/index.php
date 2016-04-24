<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="./style.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="./connectDB.js"></script>
<script src="./fnCenter.js"></script>

<title>圖書查詢系統</title>
<h1>查詢系統</h1><hr>
</head>
<body>
<?php
include "./connection.php";
$query = "SELECT * FROM book" or die(mysql_error());
$result = mysql_query($query);
echo "<span class = 'point'>可點選下拉式選單篩選</span><br>";
?>
<div id = "wrapper">
    <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']?>">
        <fieldset>
            <legend>Select Field</legend>
            <select id = "slct1" onChange = "populate(this.id , 'slct2')">
                <option value = "#">請選擇</option>
                <option value = "author">作者</option>
                <option value = "category">類別</option>
                <option value = "publisher">出版社</option>
            </select>
            <select id = "slct2" name = "slct2" onChange = "passValue()"></select>
        </fieldset>
        <!--<fieldset>-->
        <!--    <legend>Price Range</legend>-->
        <!--    <input type="text" name="lower_price" id = "lower_price" size = 2/> --->
        <!--    <input type="text" name="higher_price" size = 2/>-->
        <!--    <input type="submit" name="filter" id = "filter" value = "提交" onClick = "price_filter()"/>-->
        <!--</fieldset>-->
        <p id = "demo"></p>
        <table width = "100%">
            <thead>
                <tr>
                    <th>名稱</th>
                    <th>類別</th>
                    <th>售價</th>
                    <th>作者</th>
                    <th>出版社</th>
                    <th>出版日期</th>
                </tr>
            </thead>
            <tbody id = "booklist"></tbody>
    </form>
</div>
</body>
</html>
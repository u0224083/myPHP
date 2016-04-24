<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="./style.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../Scripts/knockout-3.3.0.js"></script>
<script src="./script1.js"></script>
<script src="./script2.js"></script>
<script src="./script3.js"></script>

<title>圖書查詢系統</title>
<h1>查詢系統</h1><hr>
</head>
<body>
<?php
include "./connection.php";
$query = "SELECT * FROM book" or die(mysql_error());
$result = mysql_query($query);
echo "<span class = 'point'>可點選各欄位標頭做排序</span><br>";
$data = array("古龍", 200, 10);
$rowtest = mysql_fetch_assoc($result);
print_r($data);
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
                    <th>名稱</th>
                    <th>價錢</th>
                    <th>數量</th>
                    <th>作者</th>
                    <th>出版社</th>
                    <th>出版日期</th>
                </tr>
            </thead>
            <!--
            <tbody data-bind = "foreach: book" >  
                <tr>  
                    <td data-bind = "text: name"></td>  
                    <td data-bind = "text: price"></td>  
                    <td data-bind = "text: unit"></td>
                    <td data-bind = "text: author"></td>
                    <td data-bind = "text: publisher"></td>
                    <td data-bind = "text: time"></td>
                </tr>  
            </tbody>
            -->
            <tbody id = "XX">
                
            </tbody>
    </form>
</div>
<script type="text/javascript">
    

</script>
</body>
</html>
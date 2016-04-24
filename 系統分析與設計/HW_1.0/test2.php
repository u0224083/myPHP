<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

<title>test2</title>
<?php
session_start();
include "./connection.php";
$query = "SELECT * FROM book" or die(mysql_error());
$result = mysql_query($query);
//$str = "SELECT distinct(book_author) FROM book" or die(mysql_error());
//$list = mysql_query($str);

if (isset($_POST["item"])){
    if ($_SESSION['tag'] == 0){
        switch (($_POST["item"])){
            case "name":
                $query = "SELECT * FROM book ORDER BY book_name" or die(mysql_error());
                break;
            case "price":
                $query = "SELECT * FROM book ORDER BY book_price" or die(mysql_error());
                break;
            case "unit":
                $query = "SELECT * FROM book ORDER BY book_quantity" or die(mysql_error());
                break;
            case "date":
                $query = "SELECT * FROM book ORDER BY book_publish_date" or die(mysql_error());
                break;
        }
        $_SESSION['tag'] = 1;
    }elseif($_SESSION['tag'] == 1){
        switch (($_POST["item"])){
            case "name":
                $query = "SELECT * FROM book ORDER BY book_name DESC" or die(mysql_error());
                break;
            case "price":
                $query = "SELECT * FROM book ORDER BY book_price DESC" or die(mysql_error());
                break;
            case "unit":
                $query = "SELECT * FROM book ORDER BY book_quantity DESC" or die(mysql_error());
                break;
            case "date":
                $query = "SELECT * FROM book ORDER BY book_publish_date DESC" or die(mysql_error());
                break;
        }
        $_SESSION['tag'] = 0;
    }
    //$result = mysql_query($query);
}else{
    echo "<span class = 'point'>可點選各欄位標頭做排序</span>";
}

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
            <select id = "slct2" name = "slct2"></select>
        </fieldset>
        <p id = "demo"></p>
        <table width = "100%">
            <thead>
                <tr>
                    <th><a href = "./text2.php?item=<?php echo 'name';?>">名稱</a></th>
                    <th><a href = "./text2.php?item=<?php echo 'price';?>">價錢</a></th>
                    <th><a href = "./text2.php?item=<?php echo 'unit';?>">數量</a></th>
                    <th>作者</th>
                    <th>出版社</th>
                    <th><a href = "./text2.php?item=<?php echo 'date';?>">出版日期</a></th>
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

<script type="text/javascript">
    var optionAll = new Array();
    optionAll = ["#|請選擇"];
    $(document).ready(function(){
        loadData();
    });
    
    var loadData = function(){
        $.ajax({
            type:"POST",
            url:"./selection.php"
        }).done(function(data){
            console.log(data);
            var auth = JSON.parse(data);
            var count = 1;
            for (var i in auth){
                optionAll.push(count + "|" + auth[i].book_author);
                count++;
            }
        });
    }
    
    
    function populate(s1,s2){
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        
        if (s1.value == "author"){
            var optionArr = optionAll;
        }else if(s1.value == "publisher"){
            alert("publisher");
        }
        
        for (var option in optionArr){
            var pair = optionArr[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);
        }
        
        document.getElementById("demo").innerHTML = "You select:" + s1.value + "<br>";
        document.getElementById("demo2").innerHTML = optionArr;
    }
</script>
</body>
</html>
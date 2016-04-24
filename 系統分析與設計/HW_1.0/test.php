<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<title>test</title>
<p>this is a test...</p>
<?php
include "./connection.php";
$query = "SELECT * FROM book" or die(mysql_error());
$result = mysql_query($query);

$book = mysql_fetch_array($result);
print_r($book);

$str = "SELECT distinct(book_author) FROM book" or die(mysql_error());
$list = mysql_query($str);

function mySelect(){
    echo "myFunction";
}
?>

<form id = "sentToBack" method = "GET" action = "<?php echo  $_SERVER['PHP_SELF']?>">
    <select id = "slct1" onChange = "match()">
        <option value = "#">請選擇</option>
        <option value = "author">作者</option>
    </select>
    <select id = "slct2" onChange = "dig()">
        
        <?php
        if ($_GET['value'] == 1){
            while ($row = mysql_fetch_assoc($list)){
                $i++;
                echo "<option value=$i>";
                echo $row['book_author'];
                echo "</option>";
            }
        }
        ?>
    </select>
</form>
<script type="text/javascript">
    /*
    function match(){
        $.ajax({
            type:"GET",
            url:"./test.php",
            data:$('#sentToBack').serialize(),
            success:function(){
                alert('value was submitted');
                
            }
        })
    }
    */
    
    /*
    function match(){
        //alert("working");
        var a = document.getElementById("slct1").value;
        document.getElementById("demo").innerHTML = "You select:" + a;
        if (a == "author"){
            var b = 1;
            alert('value was submitted');
            //location.href = "./test.php?value="+b;
            //document.write("location.href='./test.php?value=b'display:none");
        }
    }
    function dig(){
        var x = document.getElementById("slct2").value;
        document.getElementById("demo").innerHTML = "You select:" + x;
    }
    */
</script>
<p id = "demo"></p>
</body>
</html>
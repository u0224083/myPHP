<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8";>
<style type="text/css">
body,title{
    font-family:Arial,sans-serif;
}
table,tr,td{
    border:1px solid black;
}
#test{
    width:650px;
    text-align:center;
}
</style>
</head>
<body>
<title>Multiple Select</title>
<h1>Multiple Select Example</h1>
<?php
mysql_connect("localhost", getenv('C9_USER'), "");
mysql_select_db("c9") or die(mysql_error());
$queryData = mysql_query("SELECT * FROM customer") or die(mysql_error());

//var_dump(empty($multi) == is_null($multi));
if (isset($_GET['delete'])){
    $multi = $_GET['multiple'];
    
    echo empty($multi);
    if (empty($multi) == 1){
        echo "You haven't check.";
    }else{
        foreach($multi as $m){
            echo $m;
        }
    }
    
}

/* 此法形成巢狀php，故產生錯誤
echo "<form method = \"GET\" action=\"echo \$_SERVER['PHP_SELF'];\">";
echo "<input type = 'submit' name = 'del' id='del' value = 'Delete'>";
echo "</form>";
if (isset($_GET['del'])){
    echo "DELETE TEST";
}
*/
?>

<div id="test">
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table width=100%>
            <thead>
                <tr>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysql_fetch_assoc($queryData)) {?>
                <tr>
                    <td><?php echo $row[id];?></td>
                    <td><input type="checkbox" name="multiple[]" value="<?php echo $row['id']?>"/></td>
                </tr>
                <?php }?>
            </tbody>
            <tbuttom>
                <tr>
                    <td colspan = 2><input type="submit" name="delete" value="DELETE"/></td>
                </tr>
            </tbuttom>
        </table>
    </form>
</div>
</body>
</html>
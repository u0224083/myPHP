<html>
<head>
<style>
body{
    text-align:center;
}
#test{
    width:400px;
    text-align:center;
}
</style>
</head>
<body>
<title>Edit Method</title>
<?php
mysql_connect("localhost",getenv('C9_USER'),"");
mysql_select_db("c9") or die(mysql_error());
$queryData = mysql_query("SELECT * FROM customer") or die(mysql_error());

?>

<div id="test">
    <form method = "GET" action = "<?php echo $_SERVER['PHP_SELF']?>">
        <table width = "100%">
            <thead>
                <tr>
                    <td>ID</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_assoc($queryData)) {?>
                <tr>
                    <td><?php echo $row["id"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["id"]?></td>
                    <td><a href = "\modify.php?id=<?php echo $row["id"]?>">Modify</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </form>
</div>


</body>
</html>
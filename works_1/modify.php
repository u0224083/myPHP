<!DOCTYPE html>
<?php session_start()?>
<?php if ($_SESSION['username']) {?>
<html>
<head>
<meta charset = "utf-8";>
<style>
body{
    text-align:center;
    font-family:arial;
}
#wrapper{
    margin:0 auto;
    text-align:center;
}
.error{
    color:red;
}
</style>
</head>
<body>
<title>Modify</title>
<h1>Page of Modify</h1>
<?php
include "./connection.php";

if (!empty($_GET['id'])){
    $q = "SELECT * FROM customer WHERE ID=$_GET[id]";
    $result = mysql_query($q);
    $person = mysql_fetch_array($result);
    $count_row = mysql_num_rows($result);
    echo $count_row;
}else{
    echo "<span class = 'error'>Choose the data you want to edit.<br><a href = './member.php'>Click here</a> to return.</span>";
}
?>
<div id = "wrapper">
    <form method = "GET" action = "<?php echo $_SERVER['PHP_SELF']?>">
        <table width = "100%">
            <tr>
                <td>Name:<input type="text" name="inputName" value="<?php echo $person['name']?>"/></td>
            </tr>
            <tr>
                <td>Email:<input type="text" name="inputMail" value="<?php echo $person['email']?>"/></td>
            </tr>
            <tr>
                <td>Website:<input type="text" name="inputWebsite" value="<?php echo $person['website']?>"/></td>
            </tr>
            <tr>
                <td><input type="submit" name="modify" value="UPDATE"/></td>
            </tr>
        </table>
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
    </form>
</div>
<?php
if (isset($_GET["modify"])){
    $u = "UPDATE customer SET `name`='$_GET[inputName]' , `email`='$_GET[inputMail]' , `website`='$_GET[inputWebsite]' WHERE ID='$_GET[id]'";
    mysql_query($u) or die(mysql_error());
    header("Location: index.php");
}
?>
</body>
</html>
<?php }else {echo "You must be logged in! <a href='./login.php'>Click here</a> to return.";}?>

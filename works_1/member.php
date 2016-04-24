<!DOCTYPE html>
<?php session_start();?>
<?php if ($_SESSION['username']) {?>
<html>
<head>
<meta charset = "utf-8";>
<style>
body{
    font-family:arial;
    text-align:center;
}
#wrapper{
    text-align:center;
    width:680px;
    margin:0 auto;
}
#login_wrapper{
    text-align:right;
    margin:0 auto;
}
</style>
</head>
<body>
<title>Member</title>
<?php
include './connection.php';

$query = "SELECT * FROM customer" or die(mysql_error());
$result = mysql_query($query);
?>
<div id = "login_wrapper">
    <a href = "./register.php"><input type="submit" name="register" value="SIGN UP"/></a>
    <a href = "./login.php"><input type="submit" name="login" value="SING IN"/></a>
    
</div>
<div id = "wrapper">
    <form method = "GET" action = "./create.php">
        Name:<input type = "text" name = "inputName" value = ""/><br>
        Email:<input type="text" name="inputMail" value=""/><br>
        Website:<input type="text" name="inputWebsite" value=""/><br>
        <input type="submit" name="create" value="Add"/>
    </form>
    <form method = "GET" action = "./delete.php">
        <table width = "100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>WEBSITE</th>
                    <th>TIME</th>
                    <th><input type="checkbox" name="toggle" id="toggle" value="toggle"/></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($person = mysql_fetch_array($result)) {?>
                <tr>
                    <td><a href = "./modify.php?id=<?php echo $person['id'];?>"><?php echo $person["id"];?></a></td>
                    <td><?php echo $person["name"];?></td>
                    <td><?php echo $person["email"];?></td>
                    <td><?php echo $person["website"];?></td>
                    <td><?php echo $person["reg_date"];?></td>
                    <td><input type="checkbox" name="multiple[]" value="<?php echo $person['id']?>"/></td>
                </tr>
                <?php }?>
            </tbody>
            <tbutton>
                <tr>
                    <td colspan = 6><input type="submit" name="delete" value="DELETE"/></td>
                </tr>
            </tbutton>
        </table>
    </form>
    <form method="GET" action="./delete.php">
        
    </form>
</div>
<script type="text/javascript">
    var toggle = document.getElementById("toggle");
    toggle.onclick = function(){
        var multiple = document.getElementsByName("multiple[]");
        for(i = 0 ; i < multiple.length ; i++){
            multiple[i].checked = this.checked;
        }
    }
</script>
</body>
</html>
<?php }else {echo "You must be logged in! <a href='./login.php'>Click here</a> to return.";}?>
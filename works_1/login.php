<!DOCTYPE html>
<html>
<head>
<style>
body{
    text-align:center;
    font-family:arial;
}
#login_wrapper{
    font-family:arial;
    text-align:left;
    width:250px;
    margin:0 auto;
}
</style>
</head>
<body>
<title>Login</title>
<h1>Login</h1>
<div id = "login_wrapper">
    <form method = "GET" action = "<?php echo $_SERVER['PHP_SELF'];?>">
        <table width = "100%">
            <tr>
                <td>User:</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="passwd"/></td>
            </tr>
            <tr align = "center">
                <td colspan = 2><input type="submit" name="login_button" value="Login"/></td>
            </tr>
        </table>
    </form>
</div>
<?php
session_start();
$username = $_GET['username'];
$passwd = $_GET['passwd'];

if ($username && $passwd){
    $connect = mysql_connect("localhost" , getenv("C9_USER") , "") or die(mysql_error());
    mysql_select_db("phplogin") or die(mysql_error());
    $query = mysql_query("SELECT * FROM users WHERE username='$username'");
    $user_row = mysql_num_rows($query);
    echo $user_row;
    if ($user_row != 0){
        while ($user = mysql_fetch_assoc($query)){
            $dbfullname = $user['fullname'];
            $dbusername = $user['username'];
            $dbpasswd = $user['password'];
            echo $dbusername;
            echo "<br>" . $dbpasswd . "<br>";
        }
        if ($username==$dbusername && md5($passwd)==$dbpasswd){
            echo "You're in.<a href='./member.php'>Click here</a> to enter the member page.";
            $_SESSION['username'] = $dbusername;
            $_SESSION['fullname'] = $dbfullname;
            echo "<br>" . md5($passwd);
        }else{
            echo "Incorrect!";
            echo "<br>" . md5($passwd);
        }
    }else{
        echo "The user doesn't exit.";
    }
}else{
    echo "Please enter your accout.";
}
?>
</body>
</html>
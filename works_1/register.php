<html>
<head>
<style>
body{
    font-family:arial;
    text-align:center;
}
#register_wrapper{
    margin:0 auto;
    width:430px;
    font-family:arial;
    text-align:center;
}
.error{
    color:red;
    font-size:8px;
}
</style>
</head>
<body>
<title>Register</title>
<h1>Register</h1>
<?php
$fullname = $username = $passwd = $repeatpasswd = $fullnameError = $usernameError = $passwdError =  "";
if (isset($_GET['register'])){
    if (empty($_GET['fullname'])){
        $fullnameError = "This field is required.";
    }else{
        $fullname = $_GET['fullname'];
        if (strlen($fullname) <= 32 && strlen($fullname) >= 6){
            $fullnameError = "OK";
        }else{
            $fullnameError = "Between 6~32 letters.";
            $fullname = "";
        }
    }
    
    if (empty($_GET['username'])){
        $usernameError = "This field is required.";
    }else{
        $username = $_GET['username'];
        $conn = mysql_connect("localhost" , getenv("C9_USER") , "");
        mysql_select_db("phplogin");
        $name_check = mysql_query("SELECT username FROM users WHERE username = '$username'");
        $count_row = mysql_num_rows($name_check);
        if ($count_row == 0){
            if (strlen($username) <= 20 && strlen($username) >= 3){
                $usernameError = "OK";
            }else{
                $usernameError = "Between 3~20 letters.";
                $username = "";
            }
        }else{
            $usernameError = "The name is exit.";
            $username = "";
        }
        
    }
    
    if (empty($_GET['passwd']) || empty($_GET['repeatpasswd'])){
        $passwdError = "This field is required.";
    }else{
        $passwd = $_GET['passwd'];
        $repeatpasswd = $_GET['repeatpasswd'];
        if (strlen($passwd) <=32 && strlen($passwd) >= 8){
            if ($_GET['passwd'] != $_GET['repeatpasswd']){
                $passwdError = "Doesn't match, please try again.";
            }else{
                $passwdError = "OK";
                $passwd = md5($passwd);
                $repeatpasswd = md5($repeatpasswd);
            }
        }else{
            $passwdError = "Between 8~32 letters.";
        }
    }
    
    if ($fullnameError == "OK" && $usernameError == "OK" && $passwdError == "OK"){
        echo "It's worked.";
        $conn = mysql_connect("localhost" , getenv("C9_USER") , "");
        mysql_select_db("phplogin");
        $query_reg = mysql_query("INSERT INTO users (fullname , username , password) VALUE ('$fullname' , '$username' , '$passwd')");
        die("You have been registered! <a href='./login.php'>Click here</a> to return");
    }else{
        echo "Not yet.";
    }
}

?>
<div id = "register_wrapper">
    <form method = "GET" action = "<?php echo $_SERVER['PHP_SELF'];?>">
        <table width = "100%">
            <tr>
                <td>Your full name:</td>
                <td><input type="text" name="fullname" value = "<?php echo $fullname;?>"/></td>
                <td><span class = "error"><?php echo $fullnameError;?></span></td>
            </tr> 
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="username" value = "<?php echo $username;?>"/></td>
                <td><span class = "error"><?php echo $usernameError;?></span></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="passwd"/></td>
                <td><span class = "error"><?php echo $passwdError;?></span></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="repeatpasswd"/></td>
                <td><span class = "error"><?php echo $passwdError;?></span></td>
            </tr>
            <tr>
                <td colspan = 3 align = "center"><input type="submit" name="register" value="SIGN UP"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
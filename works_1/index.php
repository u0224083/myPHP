<html>
<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="./screen_2.css"/>

</head>
<body>
<?php
session_start();
echo $_SESSION['name'];
print_r($_SESSION)

?>
<title>Index</title>

<div class="container">
  <div class="header">
      <h1 class="header">Welcome , <?php echo $_SESSION["fullname"];?></h1>
  </div>
  <div class="left">
      <ul>
          <li>Profile</li>
          <li><a href="./setting.php"><input type="submit" name="setting" value="Setting"></a></li>
          <li><a href="./logout.php"><input type="submit" name="singout" value="Sign out"></a></li>
      </ul>
  </div>
  
  <div class="content">
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
            <form method = "GET" action = "./delete.php">
                <table width = "100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>WEBSITE</th>
                            <th>TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($person = mysql_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $person["id"];?></td>
                            <td><?php echo $person["name"];?></td>
                            <td><?php echo $person["email"];?></td>
                            <td><?php echo $person["website"];?></td>
                            <td><?php echo $person["reg_date"];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </form>
        </div>
  </div>
  <div class="footer">© Copyright by Refsnes Data.</div>
</div>
</body>
</html>
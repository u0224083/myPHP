<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8";
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Tangerine">
<style>
h1 {
    font-family: Arial, serif;
    font-size: 48px;
}
table,tr,td{
    border: 1px solid black;
}
body{
   font-family: Arial,sans-serif;
   text-align:center;
}
#wrapper{
   margin: 0 auto;
   width:800px;
   text-align:center;
}
input[name = delete] {
   width:800px;
}
</style>
</head>
<body>
<title>Add & Delete</title>
<?php
?>
<h1>PHP Form Validation</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name:<input type="text" name="name"/><br><br>
    E-mail:<input type="text" name="email"/><br><br>
    Website:<input type="text" name="website"/><br><br>
    <input type="submit" name="create" id="create" value="Create"/><br><br>
</form>
<?php
$name=$email=$website="";
mysql_connect("localhost",getenv('C9_USER'),"");
mysql_select_db("c9") or die(mysql_error());
$queryData=mysql_query("SELECT * FROM customer") or die(mysql_error());

if(isset($_POST['create'])){
   if($_POST['name'] <> ""){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $website = $_POST['website'];
      $sql="INSERT INTO customer (name , email , website) VALUES('$name' , '$email' , '$website')";
      $result=mysql_query($sql) or die(mysql_error());
      //header("location: " . $_SERVER['PHP_SELF']);
   }else{
      echo "Please sign the name.<br>";
   }
}

echo "Your Input:<br>";
echo "Name:" . $name . "<br>Email:" . $email . "<br>Website:" . $website . "<br>";

if(isset($_GET['delete'])){
   $multi=$_GET['multiple'];
   if (empty($multi) == 1){ //判斷是否為空值
      echo "You should confirm your checked.";
   }else{
      $i=0;
      $sql="DELETE FROM customer ";
      foreach($multi as $item_id){
         $i++;
         if($i == 1){
            $sql .= "WHERE id=" . mysql_real_escape_string($item_id) . "";
         }else{
            $sql .= " OR id=" . mysql_real_escape_string($item_id) . "";
         }
      }
   echo $sql . "<br>The records delete successfully.";
   mysql_query($sql) or die(mysql_error());
   header("location: " . $_SERVER['PHP_SELF']);
   }
   //
   //exit();
}
?>

<div id = "wrapper">
   <?php if (mysql_num_rows($queryData) > 0):?>
   <form method="GET" actoin="<?php echo $_SERVER["PHP_SELF"];?>">
      <table width="100%">
         <thead>
            <tr>
               <th>ID</th>
               <th>NAME</th>
               <th>EMAIL</th>
               <th>WEBSITE</th>
               <th>TIME</th>
               <th><input type="checkbox" name="toggle" id="toggle"/></th>
            </tr>
         </thead>
         <tbody>
            <?php while ($row = mysql_fetch_assoc($queryData)) {?>
               <tr>
                  <td><?php echo $row["id"]; ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["website"]; ?></td>
                  <td><?php echo $row["reg_date"]; ?></td>
                  <td><input type="checkbox" name="multiple[]" value="<?php echo $row['id']?>"></td>
               </tr>
            <?php }?>
         </tbody>
         <tbuttom>
            <tr>
               <td colspan=6 align=center><input type="submit" name="delete" value="DELETE" style="width=600px"></td>
            </tr>
         </tbuttom>
      </table>
   </form>
   <?php else: ?>
      <h2>No data to display</h2>
   <?php endif; ?>
</div>
<script type="text/javascript">
   var toggle = document.getElementById('toggle');
   toggle.onclick=function(){
      var multiple = document.getElementsByName('multiple[]');
      
      for(i = 0 ; i<multiple.length ; i++){
         multiple[i].checked = this.checked;
      }
   }
</script>
</body>
</html>
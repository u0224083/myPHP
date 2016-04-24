<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Tangerine">
<style>
h1 {
    font-family: 'Tangerine', serif;
    font-size: 48px;
}
table,th,td{
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
$name=$email=$website="";
function data_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=data_input($_POST["name"]);
    $email=data_input($_POST["email"]);
    $website=data_input($_POST["website"]);
}

?>

<h1>PHP Form Validation</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name:<input type="text" name="name"/><br><br>
    E-mail:<input type="text" name="email"/><br><br>
    Website:<input type="text" name="website"/><br><br>
    <input type="submit" name="submit"/><br><br>
</form>

<?php
echo "Your Input:<br>";
echo "Name:" . $name . "<br>Email:" . $email . "<br>Website:" . $website . "<br>";

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;
$conn = new mysqli($servername, $username, $password, $database, $dbport);

if ($name<>""){
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="INSERT INTO customer(name,email,website) VALUES ('$name','$email','$website')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}
$sql="SELECT * FROM customer";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>NAME</th><th>WEBSITE</th><th>TIME</th><th>#</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $a = $row["id"];
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["website"]. "</td><td>" . $row["reg_date"] . "</td><td>" . "<input type='checkbox' name='multiple[]' value='<?php echo $a?>'" . "</td></tr>";
    }
    echo "<form method=\"GET\" action=\"<?php echo htmlspecialchars(\$_SERVER[\"PHP_SELF\"]);?>";
    echo "<tr><td colspan='5' align='center'><input type='submit' name='delete' value='DELETE'></td></tr></table>";
    echo "</form>";
}   else {
    echo "0 results";
}

if (isset($_GET['delete'])){
    echo "Delete test.";
}
$conn->close();
?>
</body>
</html>
<?php
if (isset($_POST["item"])){
    if ($_SESSION['tag'] == 0){
        switch (($_POST["item"])){
            case "name":
                $query = "SELECT * FROM book ORDER BY book_name" or die(mysql_error());
                break;
            case "price":
                $query = "SELECT * FROM book ORDER BY book_price" or die(mysql_error());
                break;
            case "unit":
                $query = "SELECT * FROM book ORDER BY book_quantity" or die(mysql_error());
                break;
            case "date":
                $query = "SELECT * FROM book ORDER BY book_publish_date" or die(mysql_error());
                break;
        }
        $_SESSION['tag'] = 1;
    }elseif($_SESSION['tag'] == 1){
        switch (($_POST["item"])){
            case "name":
                $query = "SELECT * FROM book ORDER BY book_name DESC" or die(mysql_error());
                break;
            case "price":
                $query = "SELECT * FROM book ORDER BY book_price DESC" or die(mysql_error());
                break;
            case "unit":
                $query = "SELECT * FROM book ORDER BY book_quantity DESC" or die(mysql_error());
                break;
            case "date":
                $query = "SELECT * FROM book ORDER BY book_publish_date DESC" or die(mysql_error());
                break;
        }
        $_SESSION['tag'] = 0;
    }
    //$result = mysql_query($query);
}else{
    echo "<span class = 'point'>可點選各欄位標頭做排序</span>";
}
?>
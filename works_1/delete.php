<?php
include "./connection.php";

if (isset($_GET['delete'])){
    $multi = $_GET['multiple'];
    if (empty($multi) == 1){
        header("Location: index.php");
    }else{
        $i = 0;
        $sql = "DELETE FROM customer ";
        foreach ($multi as $m){
            $i++;
            if ($i == 1){
                $sql .= "WHERE id=" . mysql_real_escape_string($m);
            }else{
                $sql .= " OR id=" . mysql_real_escape_string($m);
            }
        }
        mysql_query($sql) or die(mysql_error());
        header("Location: index.php");
    }
    
}
?>
<?php
 include "connection.php";
 $sql="DELETE FROM productos WHERE id='{$_GET['id']}'";
 $query=  mysqli_query($con, $sql)or die(mysqli_error($con));
 header('Location:products.php');
 ?>

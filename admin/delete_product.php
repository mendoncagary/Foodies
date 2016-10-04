<?php
include('../includes/config.php');

$get_id=$_GET['id'];

mysql_query("delete from tb_products where productID='$get_id'")or die(mysql_error());
header('location:product.php');
?>

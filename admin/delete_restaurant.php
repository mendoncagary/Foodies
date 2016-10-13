<?php
include('../includes/config.php');

$get_id=$_GET['id'];

mysql_query("delete from restaurants where id='$get_id'")or die(mysql_error());
header('location:restaurant.php');
?>

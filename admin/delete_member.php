<?php
include('connect.php');

$get_id=$_GET['id'];

mysql_query("delete from tbl_users where userID='$get_id'")or die(mysql_error());
header('location:member.php');
?>

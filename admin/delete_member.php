<?php
include('connect.php');

$get_id=$_GET['id'];

mysql_query("delete from tb_member where memberID='$get_id'")or die(mysql_error());
header('location:member.php');
?>

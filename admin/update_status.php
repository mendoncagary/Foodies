<?php
include('../includes/config.php');


$get_id=$_GET['id'];

mysql_query("update order_details set status='Delivered', modeofpayment='Paypal' where orderid='$get_id'")or die(mysql_error());

header('location:orders.php');

?>
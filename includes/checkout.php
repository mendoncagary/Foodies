<?php 
session_start();
require_once("class.user.php");
$user = new User();

if(isset($_POST["action"]) == "checkout")
{
	
	foreach($_SESSION['cart_item'] as $item) {
	$stmt = $user->runQuery("INSERT INTO order_details(memberID,qty,price,productID,status,modeofpayment) VALUES (':userid', ':qty', ':price',':productid',':status',':mop')");
	 $stmt->execute(array(":productID"=>$_SESSION['userSession'],":qty"=>$item['quantity'],":price"=>$item['price'],":productid"=>$item['id'],":status"=>"Pending",":mop"=>"CashOnDelivery"));
	
}

}

?>
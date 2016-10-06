<?php
session_start();
require_once("config.php");

 require_once( "cart.php" );
 $cart = new Cart();
 $action = strip_tags( $_GET["action"] );
 switch ($action) {
  case "add":
   $cart->addToCart();
   break;
   case "remove":
			$cart->removeFromCart();
			break;
   case "empty":
			$cart->emptyCart();
			break;
	
 }
?>
<?php 
session_start();
require_once("class.user.php");
$user = new User();
if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $user->runQuery("SELECT * FROM tb_products WHERE productID=:id");
			$productByCode->execute(array(":id"=>$_POST["id"]));
			$row = $productByCode->fetch(PDO::FETCH_ASSOC);
			$itemArray = array($row["productID"]=>array('name'=>$row["name"], 'id'=>$row["productID"], 'quantity'=>$_POST["quantity"], 'price'=>$row["price"]));

			//$response = array($item_total,$quantity);
			//if(isset($_SESSION["cart_item"])){
             //$response.item_total = 0;

              //foreach ($_SESSION["cart_item"] as $item){
	
//		       $item_total += ($item["price"]*$item["quantity"]);
	// }
	 //echo json_decode($response);
//}


			if(!empty($_SESSION["cart_item"])) {
				if(array_key_exists($row["productID"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($row["productID"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
						 $quantity = $_SESSION["cart_item"][$k]["quantity"];
						 echo $quantity;
					
					}
				}
				else 
				{
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					
					echo $_POST['quantity'];
				}
			}
			else 
			{
				$_SESSION["cart_item"] = $itemArray;
				echo $_POST['quantity'];
			}
		}
	break;
	
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if( $_POST["id"] == $k )
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;

	case "minus":
		if(!empty($_POST["quantity"])) {
			$productByCode = $user->runQuery("SELECT * FROM tb_products WHERE productID=:id");
			$productByCode->execute(array(":id"=>$_POST["id"]));
			$row = $productByCode->fetch(PDO::FETCH_ASSOC);
			$itemArray = array($row["productID"]=>array('name'=>$row["name"], 'id'=>$row["productID"], 'quantity'=>$_POST["quantity"], 'price'=>$row["price"]));

			if(!empty($_SESSION["cart_item"])) {
				if(array_key_exists($row["productID"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($row["productID"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
							   echo $_SESSION["cart_item"][$k]["quantity"];
					}
				}
	
}
} 
}
}
?>

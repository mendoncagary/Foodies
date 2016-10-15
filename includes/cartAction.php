<?php
// initialize shopping cart class
require 'class.user.php';
$user = new USER();
include 'class.cart.php';
include 'connect.php';
$cart = new Cart;

// include database configuration file
if(isset($_POST['action']) && !empty($_POST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $stmt = $user->runQuery("SELECT * FROM tb_products WHERE productID =:productID ");
        $stmt->execute(array(":productID"=>$productID));
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        
		{$itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );
        }
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'../cart/cart.php':'../order/order.php';
		echo "done";
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: ../cart/cart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $conn->query("INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $conn->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $conn->runQuery($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
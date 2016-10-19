<meta charset="utf-8">


<?php

session_start();

/*if(!isset($_SESSION["login"]))
{
header("Location:../login/switch.php");
exit();
}

if($_POST['address']==NULL && $_POST['city']==NULL && $_POST['state']==NULL && $_POST['zipcode']==NULL && $_POST['phone']==NULL && $_POST['payment']==NULL)
{
header("Location:checkout.php");
exit();
}

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="Pharmacy"; // Database name
$tbl_name1="morder"; // Table name
$tbl_name2="orderdetails"; // Table name
$tbl_name3="User"; // Table name
*/
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


$myusername=$_SESSION["myusername"];

$sql="SELECT * FROM $tbl_name3 WHERE username='$myusername'";

$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

 if($count==0)
	{
	echo "Sorry there was a problem with the connection to the Server";
    }
else
{
	while($row=mysql_fetch_array($result))
		{
    		$userid=$row["Userid"];
   
            $orderaddress=$_POST['address'];
            $ordercity=$_POST['city'];
            $orderstate=$_POST['state'];
            $orderzipcode=$_POST['zipcode'];
            $orderphone=$_POST['phone']; 
            $ordertax=0.04*$_SESSION['total']; 
           // $ordershipping=$_SESSION['shipping'];
		    $ordershipping=$_POST['radio'];
            $orderamount=$_SESSION['total']+$ordershipping+$ordertax;
            $orderpayment=$_POST['payment'];
            $orderstatus="Pending";

            date_default_timezone_get("Asia/Kolkata");
            $mydate=date("Y-m-d l h:i:s a");
	
            $query="INSERT INTO `morder`(`userid`, `orderamount`, `orderaddress`, `ordercity`, `orderstate`, `orderzipcode`, `orderphone`, `ordertax`, `ordershipping`, `orderpayment`, `date`, `status`) VALUES ('$userid','$orderamount','$orderaddress','$ordercity','$orderstate','$orderzipcode','$orderphone','$ordertax','$ordershipping','$orderpayment','$mydate','$orderstatus')";
            mysql_query($query);
			
			$query="SELECT * FROM `morder` ORDER BY orderid DESC LIMIT 1";
			$result=mysql_query($query);
			

           // Mysql_num_row is counting table row
           $count=mysql_num_rows($result);
			
			if($count==0)
	       {
	       echo "Sorry could not fetch orderid";
           }
           else
           {
 	       while($row=mysql_fetch_array($result))
		   {
           $orderid=$row["orderid"];			
			
			class Item{
	
         	var $id;
	        var $name;
	        var $price;
	        var $quantity;
	

            }

			
			$cart=unserialize(serialize($_SESSION["cart"]));
			
			for($i=0;$i<count($cart);$i++)
            {
				$productid=$cart[$i]->id;
				$quantity=$cart[$i]->quantity;
				
			$query="INSERT INTO `orderdetails`(`orderid`, `productid`, `quantity`) VALUES ($orderid,$productid,$quantity)";	
			mysql_query($query);
			
			}
	         $_SESSION["orderid"]="$orderid";
            header("Location:ordersuccess.php");
           }

        }	
	
}
}




?>

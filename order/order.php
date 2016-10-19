<?php 
session_start();
require_once '../includes/class.user.php';
$user = new USER();
$user_login = new USER();




 if(isset($_SESSION["place"]))
   {	$place = $_SESSION['place'];
   }
   else
   { $place="Location unknown";
   }
 
 if(isset($_GET["res_id"]))
 {
	 $rid = $_GET["res_id"];
	 $_SESSION['rid'] = $rid;
	 
 }
 
 
 if(!isset($rid))
 {
	 $user->redirect("../restaurant/restaurant.php");
	 
 }
 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="order.css">
<link rel="stylesheet" type="text/css" href="../assets/libraries/font-awesome-4.6.3/css/font-awesome.css">
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->



<title>Foodies</title>

</head>

<body onload="myFunction()">

<div id="loader"></div>

<div id="page">



<div id="header">
<nav id="innercontent">
<ul>
  <li><a id="link1" class="mainlink" href="#home">About</a></li>
  <li><a id="link2" class="mainlink" href="#news">Menu</a></li>
  <li><a id="link3" href="../home.php">
      <img src="../assets/images/img5.png" alt="Foodies" id="logo" height="160" width="160">
       </a></li>
  <li><a id="link4" class="mainlink" href="#contact">Offers</a></li>
  
  <li>
	<?php if($user_login->is_logged_in())
	{
		?>
		<a id="linkw" class="mainlink">Welcome</a>
		<a id="link5" class="mainlink ng-hide">Sign In</a>
	<?php
	} 
	else
	{
		?>
		<a id="linkw" class="mainlink ng-hide">Welcome</a>
		<a id="link5" class="mainlink">Sign In</a>
	<?php
	}
	?>
</li>
	

<?php 
if($user_login->is_logged_in())
{
	?>	
<li>
<a id="link6" class="icon-link"><img src="../assets/images/img27.jpg" alt="lang"></a>
  
  </li>
<?php }
else{
	?>
<li>
<a id="link6" class="icon-link ng-hide"><img src="../assets/images/img27.jpg" alt="lang"></a>
  
  </li>
<?php 
}
?>
  
  </ul>


  <?php
  if($user_login->is_logged_in())
  {
	  ?>
 <ul id="box-signin">
  <li id="usernamelist">Hi <?php   

  $stmt = $user_login -> runQuery("select * from tbl_users WHERE userID = :id");
							$stmt->execute(array(":id"=>$_SESSION['userSession']));			
							
							while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
	                         echo $row["userName"];
                            }
     ?>
 </li>
  <li><a href="cart/cart.php" title="Carts">
  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
 Cart
  </a></li>
  <li><a href="#" title="Track Orders"
  > Track Orders
  </a></li>
  <li><a title="Logout" class="current_logout"> Logout
  </a></li>
  </ul>
  <?php }
  else
  {
	  ?>
  <ul id="box-signin" class="ng-hide">
  <li id="usernamelist">Hi 
 </li>
  <li><a href="cart/cart.php" title="Carts">
  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
 Cart
  </a></li>
  <li><a href="#" title="Track Orders"
  > Track Orders
  </a></li>
  <li><a title="Logout" class="current_logout"> Logout
  </a></li>
  </ul>
  <?php }?>

</nav>


</div>


<!-- Sign in Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
	
	
	
    <div class="panel-signin">
	
	<form method="POST" id="sign-in-form">
		<button id="signin_close" type="button" class="close" >
		<span>×</span>
		<!--<img src="images/close.47cfd871.png" alt="">-->
		</button>
      <div class="space-50"></div>
      <h2>Sign In</h2>
	  
	  
	<div class="clearfix"></div>
	
	<div class="col-sm-12">
	<div class="floating-placeholder"> 
	<input id="email-input" name="txtemail" class="modalinput" onblur="validate('email-input','email-error',this.value)" type="text"> 
	<label for="email-input">Email/Mobile</label> 
	</div>
	<!--Error text-->
	<span id="email-error" class='error-text'><!--Enter valid email or mobile number --></span>
	</div>
	
      
	 <div class="col-sm-12">
	 <div class="floating-placeholder">
	 <input id="password-input" name="txtupass" class="modalinput" onblur="validate('password-input','password-error',this.value)" type="password"> 
	 <label for="password-input">Password</label> </div>
	<!--Error text-->
	<span id="password-error" class="error-text"><!--Password is too short(minimum is 6 character)--> </span> 
	 </div> 
    
	<div class="clearfix"></div>
	<div class="space-15"></div>
	
	 <div class="col-sm-12"> 
	 <div class="pull-left">
	 <input name="checkboxG1" id="checkboxG1" class="css-checkbox" type="checkbox">
	 <label id="remember_label" for="checkboxG1" class="css-label">Remember me</label></div>
	 <div class="pull-right">
	 <a href="includes/fpass.php">Forgot Password ?</a>
	 </div> </div>
	
	
	<div class="clearfix"></div>
	<div class="space-20"></div>
	
	
	<div class="col-sm-12"> 
	<input id="btn-login" name="btn-login" value="Let me in" class="sign-up-btn" onclick="checkForm()" type="submit"> 
	</div>
	
	<div class="clearfix"></div>
	<div class="space-15"></div>
  
	<div class="or">or</div>
	
	
	<div class="clearfix"></div>
	<div class="space-15"></div>
	
	<div class="col-sm-6"> 
	<button onclick="fb_login(&quot;signup&quot;)" class="facebook-btn">
	<i class="fa fa-facebook"></i> Sign in with Facebook</button>
	</div>
	
	<div class="col-sm-6"> 
	<button onclick="auth(&quot;signin&quot;)" class="google-btn"><i class="fa fa-google-plus"></i> Sign in with Google+</button> 
	</div>
	
	<div class="clearfix"></div>
	
	<div class="space-15"></div>
	
	<p class="terms"> By signing here, you agree to our Terms of Service and Privacy Policy</p>
	
	<div class="space-20"></div>
	<div class="clearfix"></div>
	
	<div class="col-sm-12"> <div class="new-member"> New User? 
	<a class="" id="sign-up-button">Sign Up</a></div> </div>
	<div class="clearfix"></div>
	<div class="space-50"></div>
  </div>
  
  </form>
</div>
</div>



<!-- Sign up Modal -->
<div id="signupModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
	
	
	
    <div class="panel-signin">
	
	<form method="POST">
		<button id="signup_close" type="button" class="close" >
		<span>×</span>
		<!--<img src="images/close.47cfd871.png" alt="">-->
		</button>
      <div class="space-50"></div>
      <h2>Sign up</h2>
	  
	  
	  <div class="clearfix"></div> 
	
	<div class="col-sm-12">
	<div class="floating-placeholder"> 
	<input id="sign-up-name" name="regname" class="modalinput" type="text"> 
	<label for="name">Name</label> 
	</div>
	<!--Error text-->
	<span class='error-text'><!--Enter valid email or mobile number --></span>
	</div>
	
      
	 <div class="col-sm-6">
	 <div class="floating-placeholder">
	 <input id="sign-up-password" name="regpass" class="modalinput" type="password"> 
	 <label for="regpass">Password</label> </div>
	<!--Error text-->
	<span class="error-text"><!--Password is too short(minimum is 6 character)--> </span> 
	 </div> 
    
	 <div class="col-sm-6">
	 <div class="floating-placeholder">
	 <input id="sign-up-email" name="regemail" class="modalinput" type="email"> 
	 <label for="regemail">Email</label> </div>
	<!--Error text-->
	<span class="error-text"><!--Password is too short(minimum is 6 character) --></span> 
	 </div> 
    
	
	<div class="clearfix"></div>
	<div class="space-20"></div>
	

	
	<div class="col-sm-12"> 
	<input name="btn-signup" value="Sign up" class="sign-up-btn" type="submit"> 
	</div>
	
	<div class="clearfix"></div>
	<div class="space-15"></div>
  
	<div class="or">or</div>
	
	
	<div class="clearfix"></div>
	<div class="space-15"></div>
	
	<div class="col-sm-6"> 
	<button onclick="fb_login(&quot;signup&quot;)" class="facebook-btn">
	<i class="fa fa-facebook"></i> Sign in with Facebook</button>
	</div>
	
	<div class="col-sm-6"> 
	<button onclick="auth(&quot;signin&quot;)" class="google-btn"><i class="fa fa-google-plus"></i> Sign in with Google+</button> 
	</div>
	
	<div class="clearfix"></div>
	
	<div class="space-15"></div>
	
	<p class="terms"> By signing here, you agree to our Terms of Service and Privacy Policy</p>
	
	<div class="space-20"></div>
	<div class="clearfix"></div>
	
	<div class="col-sm-12"> <div class="new-member"> Already a Member? 
	<a class="" id="sign-in-button">Sign in</a></div> </div>
	<div class="clearfix"></div>
	<div class="space-50"></div>
  </div>
  
  </form>
</div>
</div>




<div class="bgimg1">
<div id="headerbox">
<h2 class="headline"><span class="first-letter">O</span>rder</h2>
</div>

</div>


<section style="position: relative;" class="black-menu"> 
<div class="container">
 <div class="col-sm-6 col-lg-6"> 
 <div class="location-icon-white"></div> 
 <div class="location">
 <span class="" ng-show="!showEditLocality">
 <div class="locality-ellipsis"><?php echo $place;?></div>
 <div class="widthlocality">
 <input value="Edit" class="edit-btn" onclick="editLocality()" type="button"></div></span>
 
 
 <span class="ng-hide"> 
 <input autocomplete="off" id="googleAutoCompleteBox" class="input-locality-search" placeholder="Delivery Location" type="text">
 <img class="location_close" src="images/cross-white.26cb9f25.png" alt=""> 
 
 </span>
 </div> 
 
 <div class="filter-icon-white">
 <button type="button" class="dropdown-toggle"> 
 <img src="images/filter_empty.bcdd107b.svg" alt="" class="displayblock"> 
 <img src="images/filter_applied.b1f2cad7.svg" alt="" class="displayblock ng-hide"> 
 <img src="images/filter_empty_mobile.b9124006.svg" alt="" class="displaynone filter-show"> 
 <img src="images/filter_applied_mobile.406ef5d0.svg" alt="" class="displaynone filter-show ng-hide">
 </button> 
 <ul class="dropdown-menu" id="dropdown-menu2"> 
 
 <li class="scope"> 
 <a class="binding" href="">Non-Veg<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li>
 <li class="scope">
 <a class="binding" href="">Veg<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li>
 <li class="scope"  > 
 <a class="binding" href="">Supreme<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <li class="scope">
 <a class="binding" href="">Signature<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li>
 <li class="scope"  >
 <a class="binding" href="">Classic<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 
 <li class="scope"  > 
 <a class="binding" href="">Non-Spicy<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <!-- end ngRepeat: tag in tags -->
 <li class="scope"  > 
 <a class="binding" href="">Best Sellers<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li>
 <li class="scope"  > 
 <a class="binding" href="">Spicy<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 
 <li class="scope"  > 
 <a class="binding" href="">Paneer Dishes<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <li class="scope"  > 
 <a class="binding" href="" >Protein Punch<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 
 </ul> </div> </div>
 
 <?php 
 
 if(isset($_SESSION["cart_item"]))
 {
 if(count($_SESSION["cart_item"])>0)
 {
	 ?>
 <div class="col-lg-6 col-sm-6 pull-right"> 
 <div id="total_items" class="circle"><?php echo count($_SESSION['cart_item']);?></div> 
 <input id="checkout" value="Checkout" onclick="document.location.href='../cart/cart.php'" class="check-out" type="button"> 
 <img src="images/cart-icon.e823b04a.svg" alt="" onclick="redirect_to_cart()" class="displaynone" style="margin-top:15px"> 
 <div class="price-outer"> 
 <div class="price"> <span>₹</span> <?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;

    foreach ($_SESSION["cart_item"] as $item){
		
		 $item_total += ($item["price"]*$item["quantity"]);
	 }
	 echo $item_total;
}
		?>


</div> </div> 
 
 </div> 
 <?php }}
else
{	?>
<div class="col-lg-6 col-sm-6 pull-right hideCheckOut"> 
 <div id="total_items" class="circle">0</div> 
 <input id="checkout" value="Checkout" onclick="document.location.href='../cart/cart.php'" class="check-out" type="button"> 
 <img src="images/cart-icon.e823b04a.svg" alt="" onclick="redirect_to_cart()" class="displaynone" style="margin-top:15px"> 
 <div class="price-outer"> 
 <div class="price"> <span>₹</span> 0 </div> </div> 
 
</div><?php } ?>

 
 </div> 
</section>





<div class="section">

<?php

                            
							
							
                            $stmt = $user -> runQuery("select * from tb_products WHERE resid = :resid");
							$stmt->execute(array(":resid"=>$rid));
							
							
							
							while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
								$qty = $row['quantity'];
								
								 $stmt1 = $user -> runQuery("SELECT *,SUM(qty) as qty FROM order_details WHERE productID = :productID AND status=:status");
							     $stmt1->execute(array(":productID"=>$row["productID"],":status"=>"Delivered"));
							
							     $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
							     $total_qty = $qty - $row1['qty'];
                            
                                
                                ?>
								
<div class="fooddiv" data-item-id="<?php echo $row['productID'];?>" data-chef-name="<?php echo $row['chef'];?>" data-price="<?php echo $row['price'];?>" data-name="<?php echo $row['name'];?>" data-dish-name="<?php echo $row['name'];?>">
   
    <div class="dish-img">
      
      <div class="dish-image-anchor">
        <a href="#"  class="modal-popup">
          <label class="dish-label"><span><?php echo $row["filter"];  ?></span></label>
          
		  <?php
			$k = $row['productID'];
			if(isset($_SESSION["cart_item"][$k]["quantity"]))
			{
				?>
          <span class="dish-addToCart1"><?php echo $_SESSION["cart_item"][$k]["quantity"];?></span>
          
			<?php }
			else
			{?>
		          <span class="dish-addToCart">0</span>
				  <?php
			}?>
          <span class="dish-rating"><i class="fa fa-star icon-star" aria-hidden="true"></i><?php echo $row["rating"];?></span>
          
          <img alt="Dsc 7926" class="food-item-placeholder-image-url" src="../assets/images/img6.jpg">
        </a>
      </div>
      
      <i class="icon icon-veg">
        <span class="path1"></span><span class="path2"></span><span class="path3"></span>
      </i>
    </div>
    
    <div class="dish-description">
      <p>
        <a href="#"><?php echo $row['name']; ?></a>
      </p>
      
      <span class="dish-tag">
      	
      	
      	
      </span>
      
      
      
      
      <div class="dish-price">
      	
        <span class="pull-left">
          <i class="fa fa-inr icon-rupee" aria-hidden="true"></i><?php echo $row['price']; ?>
        </span>
         
       <?php if($total_qty > 0){ ?>
	   <div class="dish-add-remove">
            <?php
			$k = $row['productID'];
			if(isset($_SESSION["cart_item"][$k]["quantity"]))
			{
				?>
				<button data-item-id="<?php echo $row['productID'];?>" data-chef-name="<?php echo $row['chef'];?>" data-price="<?php echo $row['price'];?>" data-item-name="<?php echo $row['name'];?>" data-name="<?php echo $row['name'];?>" class="rmv-btn"  name="button" type="submit">-</button>
            <span class="added_item_cart">
			<?php echo $_SESSION["cart_item"][$k]["quantity"];?>
			</span>
			<button data-item-id="<?php echo $row['productID'];?>" data-chef-name="<?php echo $row['chef'];?>" data-price="<?php echo $row['price'];?>" data-item-name="<?php echo $row['name'];?>" data-name="<?php echo $row['name'];?>" class="add-btn added-btn"  name="button" type="submit">+&nbsp;&nbsp;Add</button>
			<?php } 
			else
			{
				?>
			<button data-item-id="<?php echo $row['productID'];?>" data-chef-name="<?php echo $row['chef'];?>" data-price="<?php echo $row['price'];?>" data-item-name="<?php echo $row['name'];?>" data-name="<?php echo $row['name'];?>" class="rmv-btn ng-hide"  name="button" type="submit">-</button>
            <span class="added_item_cart ng-hide">
			0
			</span>
       	
			<button data-item-id="<?php echo $row['productID'];?>" data-chef-name="<?php echo $row['chef'];?>" data-price="<?php echo $row['price'];?>" data-item-name="<?php echo $row['name'];?>" data-name="<?php echo $row['name'];?>" class="add-btn"  name="button" type="submit">+&nbsp;&nbsp;Add</button>
			<?php } ?>
          </div>
      </div>
	  <?php 
	   } 
	   else
	   {?>
      <div class="dish-add-remove">
           
			<button class="sold-btn"  name="button" type="submit">SOLD OUT</button>
          </div>
      </div>
	   <?php }
	  ?>
      <div class="dish-chef">
          <div class="dish-chef-img">
            <a href="#">
            
                </a>
				<a href="/chefs/chef-ramani-m-v">
				<img alt="Ramani" class="lazy" src="../assets/images/img31.jpg"></a>
            
          </div>
          <div class="dish-chef-detail">
            <span class="chef-name"><a class="chefNameLink" href="/chefs/chef-ramani-m-v">Chef <?php echo $row["chef"];?></a></span>
              <span class="chef-tag">Foodies MasterChef</span>
          </div>
        </div>
       
    </div>
	
	
	
	
  </div>


			<?php
				}
				
				
				
				
				?>
</div>





<div class="footer">
<div class="footercontent">
    <div class="col">
      <h4>Company</h4>
	  <a href="#" style="text-decoration:none;">How it works</a></br>
	  <a href="#" style="text-decoration:none;" >Service Area</a></br>
	  <a href="#" style="text-decoration:none;">Team</a></br>
	  <a href="../faq/faq.html" style="text-decoration:none;">FAQs</a></br>
	  <a href="#" style="text-decoration:none;">Careers</a></br>
	  </div>
    <div class="col">
      <h4>Legal</h4>
	  <a href="#" style="text-decoration:none;">Terms & Conditions </a></br>
	  <a href="#" style="text-decoration:none;">Quality Control </a></br>
	  <a href="#" style="text-decoration:none;">Privacy Policy</a></br>
	  
	  </div>
    
 
    <div class="col">
      <h4>Menu</h4>
	  <a href="#" style="text-decoration:none;">All Day Menu</a> </br>
	  <a href="#" style="text-decoration:none;">Lunch</a></br>
	  <a href="#" style="text-decoration:none;">Dinner</a></br>
	  <a href="#" style="text-decoration:none;">Flavours</a></br>
	  <a href="#" style="text-decoration:none;">Sitemap</a>
	  
	  </div>
    <div class="col">
      <h4>Stay tuned</h4>
	  Connect with us and stay updated!</br>
	  <p>
	  <button class="Footerbutton1" onclick="parent.open('https://www.facebook.com/')"><i class="fa fa-facebook-square" aria-hidden="true"></i></button>
	  <button class="Footerbutton2" onclick="parent.open('https://www.youtube.com/')"><i class="fa fa-youtube" aria-hidden="true"></i></button>
	  <button class="Footerbutton3" onclick="parent.open('https://www.twitter.com/')"><i class="fa fa-twitter-square" aria-hidden="true"></i></button>
	  </p></div>

</div>
</div>



</div>



<script src="../assets/libraries/jquery-3.1.0.min.js"></script>
<script src="order.js"></script>

</body>

</html>

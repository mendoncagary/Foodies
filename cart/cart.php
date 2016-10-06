<?php
  session_start();

  if(isset($_POST['total_cart_items']))
  {
	echo count($_SESSION['name']);
	exit();
  }

  if(isset($_POST['item_id']))
  {
    $_SESSION['name'][]=$_POST['item_name'];
    $_SESSION['price'][]=$_POST['item_price'];
    $_SESSION['id'][]=$_POST['item_id'];
    echo count($_SESSION['name']);
    exit();
  }

  ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="cart.css">
<link rel="stylesheet" type="text/css" href="../assets/libraries/font-awesome-4.6.3/css/font-awesome.css">
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->
<script src="../assets/libraries/jquery-3.1.0.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->



<title>Foodies</title>

</head>

<body onload="myFunction()">

<div id="loader"></div>

<div id="page">



<div id="header">
<nav id="innercontent">
<ul>
  <li><a id="link1" class="mainlink" href="../about/about.html">About</a></li>
  <li><a id="link2" class="mainlink" href="#news">Menu</a></li>
  <li><a id="link3" href="../home.php">
      <img src="../assets/images/img5.png" alt="Foodies" id="logo" height="160" width="160">
       </a></li>
  <li><a id="link4" class="mainlink" href="#contact">Offers</a></li>
  <li><a id="link5" class="mainlink">Sign In</a></li>
</ul>
</nav>
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
 <div class="locality-ellipsis">1403, Phase One, MHADA Colony 20, ... </div>
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
 
 
 <div class="col-lg-6 col-sm-6 pull-right" ng-show=" cart.items.length > 0"> 
 <div class="circle">0</div> 
 <input value="Checkout" onclick="" class="check-out" type="button"> 
 <img src="images/cart-icon.e823b04a.svg" alt="" onclick="redirect_to_cart()" class="displaynone" style="margin-top:15px"> 
 <div class="price-outer"> 
 <div class="price"> <span>₹</span> 0 </div> </div> </div> </div> 
</section>





<div class="section">

				
		<div class="container cart-container">
		<div class="space-50"></div> 
		<div class="white-container"> 
		<div class="bs-example"> 
		<div class="panel-group" id="accordion"> 
		<div class="panel">
		<div class="panel-heading">
		<h4 id="panel-title-cart" class="panel-title panel-active">
		<a style="text-decoration:none" id="pan-1" ng-click="open_cart()" href="">Cart</a> 
	
		<div class="cart-number" ng-bind="cal_total_quantity()">1</div> </h4> </div>
		<!-- cart view -->
		<div id="panel-1" class="panel-collapse">
		<div class="panel-body">
		 <upsell>
		<div class="carttable" ng-show="upsell_products.length > 0">
		<div class="bold">You may also like</div> 
		<div style="max-width: 950px;" class="bx-wrapper">
		<div style="width: 100%; overflow: hidden; position: relative; height: 310px;" class="bx-viewport">
		
		
		<div style="width: 7215%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);" class="item">
		
		<!-- ngRepeat: product in upsell_products -->
		<div class="ng-scope" >
		<div class="slide" >
		<div class="thumbnail-space">
		<img class="img-food" src="../assets/images/img7.jpg" style="cursor:auto"  alt=""> 
		<div class="caption" style="padding:10px">
		<h3 class="ng-binding" style="font-size:13px;line-height:2">Super Saver Combo </h3> 
		<span class="veg"  style="top:14px;right:11px!important"></span> 
		<div class="pull-left rupee1 ng-binding" style="font-size:12px">
		<span>₹</span> 68</div> 
		<div class="pull-right">
		<a href="" class="red-btn-primary" style="font-size:10px"  > + ADD </a> </div>
		<div class="pull-right text-center ng-hide"  style="font-size:10px">
		<input value="-" class="plus-btn-radius"  readonly="" type="button">
		<input class="input-binding" value=""  readonly="" type="text"> 
		<input value="+" class="plus-btn-radius"  readonly="" type="button"> </div>
		<div class="clearfix"></div> </div> </div> </div> </div>
		
	
		<!-- end ngRepeat: product in upsell_products -->	
		<div   class="ng-scope" > 
		<div class="slide" > 
		<div class="thumbnail-space">
		<img class="img-food" src="../assets/images/img7.jpg" style="cursor:auto"  alt="">
		<div class="caption" style="padding:10px">
		<h3 class="ng-binding" style="font-size:13px;line-height:2">Rich Chocolate Brownie </h3>
		<span class="non-veg"  style="top:14px;right:11px!important"></span>
		<div class="pull-left rupee1 ng-binding" style="font-size:12px">
		<span>₹</span> 58</div> 
		<div class="pull-right"> 
		<a href="" class="red-btn-primary" style="font-size:10px"  > + ADD </a> </div> 
		<div class="pull-right text-center ng-hide"  style="font-size:10px"> 
		<input value="-" class="plus-btn-radius"  readonly="" type="button">
		<input class="input-binding" value=""  readonly="" type="text"> 
		<input value="+" class="plus-btn-radius"  readonly="" type="button"> </div> 
		<div class="clearfix"></div> </div> </div> </div> </div>
		
		<!-- end ngRepeat: product in upsell_products -->
		<div   class="ng-scope" >
		<div class="slide" > 
		<div class="thumbnail-space">
		<img class="img-food" src="../assets/images/img7.jpg" style="cursor:auto"  alt="">
		<div class="caption" style="padding:10px">
		<h3 class="ng-binding" style="font-size:13px;line-height:2">Double Chocolate Chip Muffin </h3> 
		<span class="non-veg"  style="top:14px;right:11px!important"></span>
		<div class="pull-left rupee1 ng-binding" style="font-size:12px"><span>₹</span> 58</div>
		<div class="pull-right"> 
		<a href="" class="red-btn-primary" style="font-size:10px"  > + ADD </a> </div>
		<div class="pull-right text-center ng-hide"  style="font-size:10px"> 
		<input value="-" class="plus-btn-radius"  readonly="" type="button"> 
		<input class="input-binding" value=""  readonly="" type="text"> 
		<input value="+" class="plus-btn-radius"  readonly="" type="button"> </div>
		<div class="clearfix"></div> </div> </div> </div> </div>
		
		<!-- end ngRepeat: product in upsell_products -->
		<div   class="ng-scope" >
		<div class="slide" >
		<div class="thumbnail-space"> 
		<img class="img-food" src="../assets/images/img7.jpg" style="cursor:auto" alt="">
		<div class="caption" style="padding:10px">
		<h3 class="ng-binding" style="font-size:13px;line-height:2">Choco Lava Cake </h3>
		<span class="veg"  style="top:14px;right:11px!important">
		</span> <div class="pull-left rupee1 ng-binding" style="font-size:12px">
		<span>₹</span> 58</div> 
		<div class="pull-right">
		<a href="" class="red-btn-primary" style="font-size:10px" role="button"> + ADD </a>
		</div> <div class="pull-right text-center ng-hide"  style="font-size:10px"> 
		<input value="-" class="plus-btn-radius"  readonly="" type="button"> 
		<input class="input-binding" value=""  readonly="" type="text">
		<input value="+" class="plus-btn-radius"  readonly="" type="button"> </div> 
		<div class="clearfix"></div> </div> </div> </div> </div>
		
		<!-- end ngRepeat: product in upsell_products -->
		<div   class="ng-scope" > 
		<div class="slide" > 
		<div class="thumbnail-space">
		<img class="img-food" src="../assets/images/img7.jpg" style="cursor:auto" alt="">
		<div class="caption" style="padding:10px">
		<h3 class="ng-binding" style="font-size:13px;line-height:2">Moong Dal Ka Halwa </h3> 
		<span class="veg"  style="top:14px;right:11px!important"></span>
		<div class="pull-left rupee1 ng-binding" style="font-size:12px">
		<span>₹</span> 58</div> 
		<div class="pull-right"> 
		<a href="" class="red-btn-primary" style="font-size:10px"  > + ADD </a> </div>
		<div class="pull-right text-center ng-hide"  style="font-size:10px"> 
		<input value="-" class="plus-btn-radius"  readonly="" type="button">
		<input class="input-binding" value=""  readonly="" type="text"> 
		<input value="+" class="plus-btn-radius"  readonly="" type="button"> </div> 
		<div class="clearfix"></div> </div> </div> </div> </div>
		
		
     <!-- end ngRepeat: product in upsell_products -->
	 <div   class ="ng-scope" >
	 <div class="slide" >
	 <div class="thumbnail-space">
	 <img class="img-food" src="../assets/images/img7.jpg" style="cursor:auto" alt="">
	 <div class="caption" style="padding:10px"> 
	 <h3 class="ng-binding" style="font-size:13px;line-height:2">Ice Tea </h3>
	 <span class="veg"  style="top:14px;right:11px!important"></span> 
	 <div class="pull-left rupee1 ng-binding" style="font-size:12px">
	 <span>₹</span> 38</div>
	 <div class="pull-right"> 
	 <a href="" class="red-btn-primary" style="font-size:10px"  > + ADD </a> </div> 
	 <div class="pull-right text-center ng-hide"  style="font-size:10px"> 
	 <input value="-" class="plus-btn-radius"  readonly="" type="button">
	 <input class="input-binding" value=""  readonly="" type="text">
	 <input value="+" class="plus-btn-radius"  readonly="" type="button"> </div> 
	 <div class="clearfix"></div>
	 </div> </div> </div> </div>
	 
	 
	 <!-- end ngRepeat: product in upsell_products -->
	 <div   class="ng-scope" > <div class="slide" >
	 <div class="thumbnail-space">
	 <img class="img-food" src="../assets/images/img7.jpg" style="cursor:auto" alt="">
		<div class="caption" style="padding:10px">
		<h3 class="ng-binding" style="font-size:13px;line-height:2">Masala Lemonade </h3>
		<span class="veg"  style="top:14px;right:11px!important"></span> 
		<div class="pull-left rupee1 ng-binding" style="font-size:12px">
		<span>₹</span> 38</div>
		<div class="pull-right"> 
		<a href="" class="red-btn-primary" style="font-size:10px"  > + ADD </a> </div> 
		<div class="pull-right text-center ng-hide"  style="font-size:10px"> 
		<input value="-" class="plus-btn-radius"  readonly="" type="button"> 
		<input class="input-binding" value=""  readonly="" type="text">
		<input value="+" class="plus-btn-radius"  readonly="" type="button"> </div>
		<div class="clearfix"></div> </div> </div> </div> </div>
		
		<!-- end ngRepeat: product in upsell_products --> </div></div>
		<div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction">
		<a class="bx-prev-disabled" href="#">Prev</a>
		<a class="bx-next" href="#">Next</a></div></div></div> </div>
		
		
		
		<!-- Cart Upsell Stops -->
		<div class="carttable"> 
		<div class="row display-none">
		<div class="col-sm-6 bold">Items</div> 
		<div class="col-sm-3 text-center bold">Quantity</div> 
		<div class="col-sm-2 text-right bold">Amount</div> </div> 
		<div class="space-10"></div>

	<?php
	
    
      for($i=0;$i<count($_SESSION['id']);$i++)
     {
    
  
?>
		<!-- ngRepeat: item in cart_items.items track by item.id -->
		<div class="ng-scope-items"> <div class="row">
		<div class="col-sm-6 padding width50"> <div class="col-sm-8"> <div>
		<h3 class="ng-binding-heading" style="font-size:14px;line-height:18px"> 
		<span class="ng-binding-type"  style="font-size:10px"> Classic<br>
		</span> <?php echo $_SESSION['name'][$i]; ?> <img src="images/veg.62b68100.png" alt="" class="veg-padding"> </h3>
		<p class="ng-binding" style="font-size:12px">Regular , Original Crust </p>
		<div></div> 
		<i class="" > 
		<p  style="font-size:12px;cursor:pointer">Click to customize</p></i>
		</div> </div> </div> <div class="col-sm-3 text-center width50 plus-minus"> <!-- <div class="space-10"></div> -->
		<input value="-" class="plus-btn-radius" readonly="" type="button">
		<input class="input-quantity" value="<?php  ?>" readonly="" type="text"> 
		<input value="+" class="plus-btn-radius" readonly="" type="button"> 
		<!-- <div class="space-10"></div> --> </div> <div class="col-sm-2 text-right width50 price-pos ng-binding"> 
		<!-- <div class="space-10"></div> --> <span class="rupee">₹</span> <?php  echo $_SESSION['price'][$i]; ?><!-- <div class="space-10"></div> --> </div> 
		<div class="delete"> <!-- <div class="space-10"></div> --> 
		<a href="">
		<img src="../assets/images/delete.svg" alt=""> </a> 
		<!-- <div class="space-10"></div> --> </div> </div> <hr> </div>		
		<!-- end ngRepeat: item in cart_items.items track by item.id -->
		</div> 
		
		<?php

	 }
		?>
		
		<div class="clearfix"></div> 
		
		<div class="carttable margin">
		<div class="row"> <div class="col-sm-6 padding width50"> <div class="col-sm-7"><span class="bold"> Total Amount </span> </div> </div>
		<div class="col-sm-3 text-center width50"> </div> <div class="col-sm-2 text-right width50">
		<span class="rupee">₹</span> <strong class="ng-binding" style="font-size:18px" ng-bind="calc_cart_price()">138</strong>&nbsp; 
		<span class="ng-hide" ng-show="final_price"><i> With Taxes</i></span> <!-- <label ng-show="true"> with taxes</label> --> </div> </div>
		<div class="space-20"></div>
		<div class="row"> <div class="col-sm-6 width50">
		<input  value="Add More Items" class="continue-shoping" type="button"></div> 
		<div class="col-sm-6 text-right width50">
		<input  value="Next Step" class="next-step" type="button"></div> </div> </div>
		<div class="clearfix"></div>
		<div class="space-20"></div> </div> </div> </div>

		<!-- signin / signup view --> 
		<div id="nupMod" class="panel panel-default"> <div class="panel-heading">
		<h4 id="panel-title-signin" class="panel-title"> 
		<a style="text-decoration:none" id="pan-2" ng-click="open_sign()" href="">Sign in</a> 
		<a ng-hide="true" id="pan-21" class="accordion-toggle ng-hide" href="">Sign in</a> </h4> </div>
		<div id="panel-2" class="panel-collapse collapse"> 
		<div class="panel-body">
		<!-- already signed in -->
		<div class="payment-ul ng-hide" style="padding-bottom:0px">
		<div class="col-sm-12 ng-binding"><span>Logged in as </span> </div> 
		<div class="clearfix"></div> 
		<div class="space-20"></div> <div class="col-sm-5 col-md-2">
		<input value="Logout" class="btn-block continue-shoping radius-3 margin-right" type="button"> </div>
		<div class="col-sm-2 col-md-1 text-center center-text">Or</div>
		<div class="col-sm-5 col-md-3">
		<input value="Proceed to Payment" class="btn-block next-step radius-3 margin-left" ng-click="proceed_to_payment()" type="button">
		</div> 
		<div class="clearfix"></div> 
		<div class="space-50"></div> </div>

		<!-- sign in -->
		<div id="#myModal" class="panel-signin"> 
		<div class="space-50"></div> 
		<span class="weight-700">Already a member? Log in here</span> 
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
	    <button onclick="auth(&quot;signin&quot;)" class="google-btn">
		<i class="fa fa-google-plus"></i> Sign in with Google+</button> 
	   </div>

	
		<div class="clearfix"></div>
	
	    <div class="space-15"></div>    
	
	    <p class="terms"> By signing here, you agree to our Terms of Service and Privacy Policy</p>
	
	    <div class="space-15"></div>
		
		<div class="col-sm-12"> <div class="new-member"> Not a member? 
	<a class="" id="sign-up-button">Sign Up</a></div> </div>
	
		<div class="clearfix"></div>
		<div class="space-50"></div> </div> 
		
		<!-- signup --> <div class="panel-signin ng-hide">
		<div class="space-50"></div> <span class="weight-700">New member? Enter your details below</span>
		<div class="clearfix"></div> <div class="col-sm-12"> 
		<div class="floating-placeholder">
		<input id="name" name="name" ng-model="sign_up_name" class="input1 ng-pristine ng-untouched ng-valid" ng-class="(show_name_error_span)?'error':'input1'" type="text"> <label for="name">Name</label> </div> <span ng-show="show_name_error_span" class="error-text ng-hide">Enter you name </span> </div> <div class="col-sm-6"> <div class="floating-placeholder"> <input id="name" name="name" ng-model="sign_up_password" style="background:none" class="input1 ng-pristine ng-untouched ng-valid" ng-class="(show_password_error_span)?'error':'input1'" type="password"> <label for="name">Password</label> </div> <span ng-show="show_password_error_span" class="error-text ng-hide">Password is too short(minimum is 6 character) </span> </div> <div class="col-sm-6"> <div class="floating-placeholder"> <input id="name" name="name" ng-model="sign_up_email" style="background:none" class="input1 ng-pristine ng-untouched ng-valid" ng-class="(show_email_error_span)?'error':'input1'" type="text"> <label for="name">Email</label> </div> <span ng-show="show_email_error_span" class="error-text ng-hide">Enter valid emailid </span> </div> <div class="clearfix"></div> <div class="space-20"></div> <div class="col-sm-12"> <input ng-click="signup('customer',0)" value="Sign Up" class="radius-6 sign-up-btn" type="button"> </div> <div class="clearfix"></div> <div class="space-15"></div> <div class="text-center or">or</div> <div class="clearfix"></div> <div class="space-15"></div> <div class="col-sm-6"> <input onclick="fb_login()" value="Sign in with facebook" class="radius-6 facebook-btn" type="button"> </div> <div class="col-sm-6"> <input onclick="auth()" value="Sign in with Google +" class="radius-6 twitter-btn" type="button"> </div> <div class="clearfix"></div> <div class="space-15"></div> <p class="terms text-center"> By signing here, you agree to our Terms of Service and Privacy Policy</p> <div class="space-15"></div> <div class="col-sm-12"> <div class="new-member text-center"> Already a member? <a href="" ng-click="show_sign_in()">Sign in</a></div> </div> <div class="clearfix"></div> <div class="space-50"></div> </div> <!-- phone verify form --> <div class="ng-hide" ng-show="panel_2_view('phone_verify')"> <div class="space-50"></div> <div class="panel-signin"> <div class="space-50"></div> <div class="clearfix"></div> <h2>Sign Up / Add Mobile no.</h2> <div class="clearfix"></div> <p class="p-center">Enter your mobile number below</p> <div class="col-sm-6 col-sm-push-3"> <div class="floating-placeholder"> <input id="name" name="name" ng-model="phone_number" style="background:none" class="input1 ng-pristine ng-untouched ng-valid" ng-class="(show_phone_error_span)?'error':'input1'" type="text"> <label for="name">Mobile No.</label> </div> <span ng-show="show_phone_error_span" class="error-text ng-hide">Enter valid mobile number </span> </div> <div class="clearfix"></div> <div class="space-20"></div> <div style="text-align:center"><input value="okay" class="okay-btn text-center radius-3" ng-click="otp_generate()" type="button"></div> <div class="space-50"></div> </div> </div> <!-- otp form --> <div class="ng-hide" ng-show="panel_2_view('otp')"> <div class="space-50"></div> <div class="panel-signin"> <p class="p-center ng-binding">A code has been sent to your mobile ().Please enter the code below</p> <div class="space-20"></div> <div class="col-sm-12 text-center"> <input maxlength="1" focus="" ng-model="otp_digit_1" class="otp-code ng-pristine ng-untouched ng-valid ng-valid-maxlength" type="text"> <input maxlength="1" delfocus="" focus="" ng-model="otp_digit_2" class="otp-code ng-pristine ng-untouched ng-valid ng-valid-maxlength" type="text"> <input maxlength="1" delfocus="" focus="" ng-model="otp_digit_3" class="otp-code ng-pristine ng-untouched ng-valid ng-valid-maxlength" type="text"> <input maxlength="1" delfocus="" focus="" ng-model="otp_digit_4" class="otp-code ng-pristine ng-untouched ng-valid ng-valid-maxlength" type="text"> <input maxlength="1" delfocus="" focus="" ng-model="otp_digit_5" class="otp-code ng-pristine ng-untouched ng-valid ng-valid-maxlength" type="text"> <input maxlength="1" delfocus="" ng-model="otp_digit_6" class="otp-code ng-pristine ng-untouched ng-valid ng-valid-maxlength" type="text"> <div> <input style="text-align:center" value="okay" class="okay-btn text-center radius-3" ng-click="otp_verify()" type="button"></div> </div> <div class="clearfix"></div> <div class="space-20"></div> <p class="text-center font-11"><span>Problem receiving code?</span><br> <a ng-click="otp_resend()">Resend code</a></p> <div class="space-50"></div> </div> </div> <!-- change_password --> <div class="panel-signin width ng-hide" ng-show="panel_2_view('change_password')"> <div class="space-50"></div> <div class="col-sm-12"> <div class="floating-placeholder"> <input id="name" name="name" ng-model="verification_code" class="input1 ng-pristine ng-untouched ng-valid" type="text"> <label for="name">Verification Code</label> </div> </div> <div class="col-sm-12"> <div class="floating-placeholder"> <input id="name" name="name" ng-model="new_password" class="input1 ng-pristine ng-untouched ng-valid" type="password"> 
		<label for="name">New Password</label> </div>
		</div> 
		
		<div class="col-sm-12"> <div class="floating-placeholder">
		<input id="name" name="name" ng-model="password_confirmation" class="input1  type="password"> 
		<label for="name">Confirm Password 
		<img src="images/star.6c957114.jpg" alt="" style="margin-bottom:3px"> </label> 
		</div> </div>
		
		<div class="clearfix"></div> 
		<div class="space-20">
		</div>
		
		<div class="col-sm-12"> 
		<input ng-click="password_reset()" value="Continue" class="radius-6 change-password" type="button"> </div>
		<div class="clearfix"></div> 
		<div class="space-50"></div>
		</div> </div> </div> </div>


		<!-- delivery address view--> <div class="panel panel-default"> <div class="panel-heading"> 
		
		<h4 id="panel-title-delivery" class="panel-title"> <a style="text-decoration:none" id="pan-3" href="">Delivery Address</a>
		<a  id="pan-31" class="accordion-toggle ng-hide" href="">Delivery Address</a> </h4> </div> <div id="panel-3" class="panel-collapse collapse"> <div class="panel-body">
		<!-- address list --> <div class="delivery-pad">
		<div class="col-sm-6 width50">
		<span>Your address list</span></div> 
		<div class="col-sm-6 width50"> 
		<input value="Add new address" class="show-all-btn radius-3" type="button"></div>
		<div class="clearfix"></div>
		
		
		<ul> <li class="list-inline showaction ellipsis-add" style="max-width:100%" > <input name="take_away" class="css-checkbox" id="takeAway" ng-checked="takeAway" type="radio"> <label for="take_away" class="css-label radGroup1" style="width:80%">
		<div class="ellipsis-add" style="float:left ;max-width:100%">I'll pick up</div></label> </li>
		<!-- ngRepeat: address in addresses --> 
		</ul> 
		
		<input ng-click="make_payment()" value="Make Payment" class="next-step radius-6" type="button"> </div> 
		<!--  </div>
                  </div> -->

				  <!--  add address form --> 
				  <div class="delivery-pad ng-hide" > <div class="col-sm-6 width50">
				  <span>Your address list</span></div>
				  <div class="col-sm-6 width50"> <input ng-click="show_all()" value="Show all" class="show-all-btn radius-3" type="button"></div>
				  <div class="clearfix"></div> 
				  <div class="panel-signin pull-left">
				  <div class="col-sm-12"> 
				  <div class="floating-placeholder"> 
				  <input id="name" ng-model="address_line" name="name" class="input1 ng-pristine ng-untouched ng-valid" type="text"> 
				  <label for="name">Flat No., Building Name, Society/ Office Name</label> </div> </div> 
				  <div class="col-sm-12">
				  <div class="floating-placeholder">
				  <input id="googleAutoCompleteBox" ng-model="address_landmark" placeholder="" name="name" class="input1 ng-pristine ng-untouched ng-valid" type="text">
				  <label for="name">Nearest Landmark <i>(optional)</i></label> </div> </div>
				  <div class="clearfix"></div> <!-- <div class="space-20"></div> --> 
				  <div class="col-sm-12 color1"> <!-- <img src="images/location-gray.00a7d2e7.svg" alt="" style="margin-right:15px;"> -->
				  <div class="floating-placeholder floating-placeholder-float">
				  <input id="locality" name="name" placeholder="" ng-model="add_locality" class="input1 ellipsis-add ng-pristine ng-untouched ng-valid" readonly="" options="options" details="localityDetails" type="text">
				  <label for="name" placeholder="Locality">Locality</label> </div> </div> <div class="clearfix"></div> 
				  <div class="space-20"></div> </div> <div class="clearfix"></div> <div class="space-20"></div> 
				  <input ng-click="save_address()" value="Add address" class="next-step radius-6" type="button"> </div>
				  </div> </div> </div> <!-- payment view --> <div class="panel panel-default">
				  <div class="panel-heading"> 
				  
				  <h4 id="panel-title-makepayment" class="panel-title"> 
				  <a style="text-decoration:none" id="pan-4" class="accordion-toggle" data-parent="#accordion" href="">Make Payment</a> 
				  <a ng-show="preorder_availibility" id="preorder_time_selector" href="" class="pull-right ng-hide" ng-click="select_preorder_time()" style="pointer-events: none;font-size:17px" popover-template="'preorder_tutorial_message.html'" popover-is-open="show_preorder_popover" popover-placement="bottom" popover-trigger="none" popover-animation="true"><div id="preorder_clock_image" class="preorder-false-inactive"></div></a> 
				  <a ng-hide="true" id="pan-41" class="accordion-toggle ng-hide" data-toggle="collapse" data-target="#panel-4" data-parent="#accordion" href="">Make Payment </a> </h4> </div> <div id="panel-4" class="panel-collapse collapse"> <payments class="ng-isolate-scope" open="" payment-method="payment_method" payment-methods="data.outlet_web.payment_methods" take-away="takeAway" show-coupon-applied="show_coupon_applied" promo-code="promo_code" final-price="final_price" total-cart-quanity="1" select-address="select_address" allowed-cashback="allowed_cashback" currency-used="currency_used" preorder-availibility="preorder_availibility" is-preorder-time-selected="is_preorder_time_selected" selected-preorder-time="selectedPreorderTime" pay-on-delivery-params="" total-payable-without-discount="total_payable_without_discount_coupon" total-payable="total_payable_coupon"><div class="panel-body"> 
				  <div class="payment-ul" style="padding-bottom:0px"> <div class="col-sm-6"><span>Choose the payment mode</span></div> 
				  <div class="clearfix"></div> <ul id="paymentMethods"> 
				  <li class="" ng-show="is_present_in_outlet('Card')"> 
				  <input ng-model="payment_method" value="Card" name="radio_dark" id="radio23" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Card')" type="radio"> <label id="Card" for="radio23" class="css-label radGroup23">Card Payment</label> </li> <li class="" ng-show="is_present_in_outlet('Cash')"> <input ng-model="payment_method" value="Cash" name="radio_dark" id="radio21" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Cash')" type="radio"> <label id="Cash" for="radio21" class="css-label radGroup23">Cash Payment</label> </li> <li class="" ng-show="is_present_in_outlet('Net Banking')">
				  <input ng-model="payment_method" value="Net Banking" name="radio_dark" id="radio22" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Net Banking')" type="radio"> <label id="Net" for="radio22" class="css-label radGroup23">Net Banking</label> </li> 
				  <li class="" ng-show="is_present_in_outlet('Wallet')"> <input ng-model="payment_method" value="Wallet" name="radio_dark" id="radio24" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Wallet')" type="radio"> <label id="Wallet" for="radio24" class="css-label radGroup23">Wallet</label> </li> </ul> </div> <div class="yellow-bg payment" ng-show="!pay_on_delivery_params.hide_coupon_panel"> <div class="space-20"></div> <div class="row"> <div class="col-md-6 panel-signin panel-signin-promo ng-hide" ng-show="show_box8_currency() &amp;&amp; !cash_currency_msg"> <div class="text-center box8-money-red"> <input ng-click="currency_click()" name="checkbox" id="checkboxG33" class="css-checkbox" type="checkbox"> <label for="checkboxG33" class="background-remove css-label box8-money-red"> <font class="ng-binding" color="#da3939 ">Use ₹ Box8 Money</font> </label> </div> </div> <div class="col-md-6 panel-signin panel-signin-promo ng-hide" ng-show="cash_currency_msg"> <div class="text-center box8-money-red"> <label class="Box8-money-red"> 
				  <font color="#da3939 ">Box8 Money is not applicable for cash payment</font> </label> </div> </div>
				  <div class="col-md-6" ng-hide="show_coupon_applied"> 
				  <div class="promo-style text-center">
				  <input ng-model="promo_code" class="input-promo-coupon radius-3 ng-pristine ng-untouched ng-valid" placeholder="Enter your promo code here" ng-disabled="pay_on_delivery_params.available" type="text"> <!-- ngIf: !pay_on_delivery_params.available --><input ng-if="!pay_on_delivery_params.available" ng-click="apply_coupon()" value="Apply" class="input-apply-btn radius-3 ng-scope" type="button"><!-- end ngIf: !pay_on_delivery_params.available --> </div> </div> 
				  <div class="col-md-6 ng-hide" ng-show="show_coupon_applied"> 
				  <div class="promo-style text-center"> <div>
				  <span class="ng-binding">Your Total Bill is <span class="strike ng-binding ng-hide" ng-show="show_strike_off()">₹&nbsp;&nbsp;</span> ₹</span> </div> 
				  <input ng-model="promo_code" class="input-promo-coupon radius-3 ng-pristine ng-untouched ng-valid" placeholder="Enter your promo code here" readonly="" type="text"> <!-- ngIf: !pay_on_delivery_params.available -->
				  <input ng-if="!pay_on_delivery_params.available" ng-click="remove_coupon()" value="Remove" class="input-apply-btn radius-3 ng-scope" type="button"><!-- end ngIf: !pay_on_delivery_params.available --> </div> </div> </div> <div class="clearfix"></div> <div class="space-20"></div> </div> <!-- cash payment --> 
				  <div class="payment-ul ng-hide" style="padding-bottom:20px" ng-show="check_payment_type('Cash')"> <div class="col-sm-6"><span>Bring change of</span></div> 
				  <div class="clearfix"></div> <ul> <li> 
				  <input checked="checked" value="50" ng-value="50" name="change_label" id="radio26" class="css-checkbox" ng-checked="true" type="radio"> 
				  <label for="radio26" class="css-label radGroup1 radGroup2">₹50/-</label> </li> <li> 
				  <input value="100" ng-value="100" name="change_label" id="radio27" class="css-checkbox" type="radio"> 
				  <label for="radio27" class="css-label radGroup1 radGroup2">₹100/-</label> </li> <li> <input value="500" ng-value="500" name="change_label" id="radio28" class="css-checkbox" type="radio"> 
				  <label for="radio28" class="css-label radGroup1 radGroup2">₹500/-</label> </li> <li>
				  <input value="1000" ng-value="1000" name="change_label" id="radio29" class="css-checkbox" type="radio"> <label for="radio29" class="css-label radGroup1 radGroup2 removechk">₹1000/-</label> </li> </ul> <div class="col-sm-12"> <input ng-init="isClicked=false" ng-disabled="isClicked" ng-click="payment_validate('Cash')" value="Make Payment" class="next-step radius-6" type="button"> </div> <div class="clearfix"></div> <div class="space-20"></div> </div>
				  <!-- card payment --> <div class="" ng-show="check_payment_type('Card')"> <div class="delivery-pad" ng-hide="show_card_form"> <div class="col-sm-6 width50"><span>Your card</span></div>
				  <div class="col-sm-6 width50"> <input ng-click="toggle_show_card_form()" value="Add new card" class="show-all-btn radius-3" type="button"> </div> <div class="clearfix"></div> 
				  <div class="col-sm-12 cards-margin"> <!-- ngRepeat: used_card in $root.used_cards | filter: getCreditDebitCards --> </div> <div class="clearfix"></div> <div class="space-20"></div> <input ng-disabled="isClicked" ng-click="payment_validate('used_card')" value="Make Payment" class="coming-soon next-step radius-6" type="button"> </div> <div class="payment-ul ng-hide" ng-show="show_card_form"> <div class="col-sm-6 width50"><span>Add New Card</span></div> <div class="col-sm-6 width50"> <input ng-click="toggle_show_card_form()" value="Show all" class="show-all-btn radius-3" type="button"> </div> <div class="clearfix"></div> <ul id="citrusCardType"> <li class="" ng-click="assign_card('debit')"> <input name="radiog_dark" id="radio66" class="css-checkbox" type="radio"> <label for="radio66" class="css-label radGroup29 debitradio">Debit Card</label> </li> <li class="" ng-click="assign_card('credit')"> <input name="radiog_dark" id="radio64" class="css-checkbox" type="radio"> 
				  <label for="radio64" class="css-label radGroup29 creditradio">Credit Card</label> </li> </ul> <select class="ng-hide" ng-show="false" id="citrusScheme"> <option value="VISA">VISA</option> <option value="mastercard">MASTER</option> <option value="amex">AMEX</option> <option value="rupay">RUPAY</option> </select> 
				  <div class="col-sm-12 col-md-12 payment-card"> <div class="col-sm-2 col-md-1"> <div class="floating-placeholder float:left">
				  <img src="images/dummy.d4ece676.png" ng-src="images/dummy.d4ece676.png" alt="" height="30"> </div> </div> <div class="col-xs-12 col-sm-12 col-md-3"> <div class="floating-placeholder"> <input name="name" id="citrusNumber" ng-model="new_card_number" class="input1 ng-pristine ng-untouched ng-valid" type="text"> <label for="name">Card Number</label> </div> </div> 
				  <div class="col-xs-12 col-sm-12 col-md-2"> <div class="floating-placeholder"> <input name="name" id="citrusCardHolder" class="input1" type="text"> <label for="name">Name</label> </div> </div> <div class="col-xs-12 col-sm-12 col-md-4"> <div style="width:50%; float:left"> <div class="floating-placeholder"> <input name="name" class="input1" disabled="" type="text"> <label for="name">Expiration</label> </div> </div> <div style="width:20%; float:left"> <div class="floating-placeholder"> <input id="expiry_month" name="name" min="1" max="12" maxlength="2" class="input1" type="text"> <label for="name">MM</label> </div> </div> <div style="width:20%; float:left"> 
				  <div class="floating-placeholder"> <input id="expiry_year" name="name" min="1" max="99" maxlength="2" class="input1" type="text"> <label for="name">YY</label> </div> </div> <div class="ng-hide" ng-show="false" style="width:0%; float:left"> <div class="floating-placeholder"> <input name="name" maxlength="2" id="citrusExpiry" class="input1" type="text"> <label for="name">Date</label> </div> </div> </div> <div class="col-xs-12 col-sm-12 col-md-2"> <div class="floating-placeholder" style="width:40%"> <input name="name" maxlength="4" id="citrusCvv" class="input1" type="password"> <label for="name">CVV</label> </div> </div> </div> 
				  <div class="clearfix"></div> <div class="space-20"></div> <div class="clearfix"></div> <div class="space-20"></div> <div class="col-sm-12"> <input ng-disabled="isClicked" ng-click="payment_validate('card')" id="citrusCardPayButton" value="Make Payment" class="next-step radius-6" type="button"> </div> <div class="clearfix"></div> <div class="space-20"></div> </div> </div> <!-- net banking --> <div class="payment-ul ng-hide" style="padding-bottom:20px" ng-show="check_payment_type('Net Banking')"> <div class="col-sm-6"><span>Choose your Bank</span></div> <div class="col-sm-6 bank"> <label class="pull-right">Select other bank <select class="ng-pristine ng-untouched ng-valid" id="select_bank" ng-model="dropdown_value" onchange="assign_bank_dropdown()"><option value="? undefined:undefined ?"></option> 
				  <!-- ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Bank of India" value="CID019" ng-if="$index > 4">Bank of India</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Central Bank" value="CID023" ng-if="$index > 4">Central Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Federal Bank" value="CID009" ng-if="$index > 4">Federal Bank</option><!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Indian Overseas Bank" value="CID027" ng-if="$index > 4">Indian Overseas Bank</option><!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Andhra Bank " value="CID016" ng-if="$index > 4">Andhra Bank </option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Vijaya Bank" value="CID042" ng-if="$index > 4">Vijaya Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="United Bank of India" value="CID041" ng-if="$index > 4">United Bank of India</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Corporation Bank " value="CID025" ng-if="$index > 4">Corporation Bank </option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Bank Of Baroda" value="CID046" ng-if="$index > 4">Bank Of Baroda</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Bank of Maharashtra " value="CID021" ng-if="$index > 4">Bank of Maharashtra </option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="UCO Bank" value="CID070" ng-if="$index > 4">UCO Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Catholic Syrian Bank" value="CID045" ng-if="$index > 4">Catholic Syrian Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="City Union Bank " value="CID024" ng-if="$index > 4">City Union Bank </option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="DEUTSCHE Bank" value="CID006" ng-if="$index > 4">DEUTSCHE Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="IDBI Bank " value="CID011" ng-if="$index > 4">IDBI Bank </option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Indian Bank" value="CID008" ng-if="$index > 4">Indian Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="ING VYSA" value="CID029" ng-if="$index > 4">ING VYSA</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Karnataka Bank" value="CID031" ng-if="$index > 4">Karnataka Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Karur Vysya Bank" value="CID032" ng-if="$index > 4">Karur Vysya Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="PNB Retail" value="CID044" ng-if="$index > 4">PNB Retail</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="PNB Corporate" value="CID036" ng-if="$index > 4">PNB Corporate</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="State Bank of Bikaner and Jaipur" value="CID013" ng-if="$index > 4">State Bank of Bikaner and Jaipur</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="State Bank of Hyderabad" value="CID012" ng-if="$index > 4">State Bank of Hyderabad</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="State Bank of Mysore" value="CID014" ng-if="$index > 4">State Bank of Mysore</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="State Bank of Travancore" value="CID015" ng-if="$index > 4">State Bank of Travancore</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="State Bank of Patiala" value="CID043" ng-if="$index > 4">State Bank of Patiala</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Union Bank Of India" value="CID007" ng-if="$index > 4">Union Bank Of India</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="YES Bank" value="CID004" ng-if="$index > 4">YES Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="Cosmos Bank" value="CID053" ng-if="$index > 4">Cosmos Bank</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --><!-- ngIf: $index > 4 -->
				  <option class="ng-binding ng-scope" ng-repeat="bank in valid_bank" text="BOI" value="CID019" ng-if="$index > 4">BOI</option>
				  <!-- end ngIf: $index > 4 --><!-- end ngRepeat: bank in valid_bank --> </select> </label> </div>
				  <div class="clearfix"></div> <ul class="bank-name"> 
				  <!-- ngRepeat: bank in valid_bank|limitTo:5 -->
				  <li class="ng-scope" ng-repeat="bank in valid_bank|limitTo:5"> 
				  <div ng-click="select_bank(bank.name)">
				  <img ng-show="is_bank_selected(bank.name)" src="images/tick.fe3ef458.png" style="z-index: 2" class="bank-img ng-hide">
				  <!-- <img  ng-src="{{get_bank_image(bank.name)}}" onclick ="assign_bank(this)" alt="{{bank.name}}" height="60"  class="bank-img"> -->
				  <img src="images/cid005.0edcaedf.png" ng-src="images/cid005.0edcaedf.png" alt="CID005" class="bank-img" height="60"> </div> 
				  <br> <br> <br> <br> 
				  <label class="ng-binding" style="PADDING-LEFT: 35px; font-weight:100"> SBI </label> </li>
				  <!-- end ngRepeat: bank in valid_bank|limitTo:5 --><li class="ng-scope" ng-repeat="bank in valid_bank|limitTo:5"> 
				  <div ng-click="select_bank(bank.name)"> <img ng-show="is_bank_selected(bank.name)" src="images/tick.fe3ef458.png" style="z-index: 2" class="bank-img ng-hide">
				  <!-- <img  ng-src="{{get_bank_image(bank.name)}}" onclick ="assign_bank(this)" alt="{{bank.name}}" height="60"  class="bank-img"> -->
				  <img src="images/cid010.da102339.png" ng-src="images/cid010.da102339.png" alt="CID010" class="bank-img" height="60"> </div>
				  <br> <br> <br> <br>
				  <label class="ng-binding" style="PADDING-LEFT: 35px; font-weight:100"> HDFC </label> </li>
				  <!-- end ngRepeat: bank in valid_bank|limitTo:5 --><li class="ng-scope" ng-repeat="bank in valid_bank|limitTo:5">
				  <div ng-click="select_bank(bank.name)"> <img ng-show="is_bank_selected(bank.name)" src="images/tick.fe3ef458.png" style="z-index: 2" class="bank-img ng-hide">
				  <!-- <img  ng-src="{{get_bank_image(bank.name)}}" onclick ="assign_bank(this)" alt="{{bank.name}}" height="60"  class="bank-img"> -->
				  <img src="images/cid001.7df35e0e.png" ng-src="images/cid001.7df35e0e.png" alt="CID001" class="bank-img" height="60"> </div> 
				  <br> <br> <br> <br>
				  <label class="ng-binding" style="PADDING-LEFT: 35px; font-weight:100"> ICICI </label> </li>
				  <!-- end ngRepeat: bank in valid_bank|limitTo:5 -->
				  <li class="ng-scope" ng-repeat="bank in valid_bank|limitTo:5">
				  <div ng-click="select_bank(bank.name)">
				  <img ng-show="is_bank_selected(bank.name)" src="images/tick.fe3ef458.png" style="z-index: 2" class="bank-img ng-hide"> 
				  <!-- <img  ng-src="{{get_bank_image(bank.name)}}" onclick ="assign_bank(this)" alt="{{bank.name}}" height="60"  class="bank-img"> --> 
				  <img src="images/cid051.6531f64f.png" ng-src="images/cid051.6531f64f.png" alt="CID051" class="bank-img" height="60">
				  </div> <br> <br> <br> <br> 
				  <label class="ng-binding" style="PADDING-LEFT: 35px; font-weight:100"> Canara </label> </li>
				  <!-- end ngRepeat: bank in valid_bank|limitTo:5 --><li class="ng-scope" ng-repeat="bank in valid_bank|limitTo:5">
				  <div ng-click="select_bank(bank.name)"> <img ng-show="is_bank_selected(bank.name)" src="images/tick.fe3ef458.png" style="z-index: 2" class="bank-img ng-hide">
				  <!-- <img  ng-src="{{get_bank_image(bank.name)}}" onclick ="assign_bank(this)" alt="{{bank.name}}" height="60"  class="bank-img"> -->
				  <img src="images/cid002.e4d2d8d3.png" ng-src="images/cid002.e4d2d8d3.png" alt="CID002" class="bank-img" height="60"> </div>
				  <br> <br> <br> <br> 
				  <label class="ng-binding" style="PADDING-LEFT: 35px; font-weight:100"> AXIS </label> </li>
				  <!-- end ngRepeat: bank in valid_bank|limitTo:5 --> </ul> <div class="col-sm-12"> 
				  <input ng-disabled="isClicked" ng-click="payment_validate('net')" id="citrusNetbankingButton" value="Make Payment" class="next-step radius-6" type="button"> </div> 
				  <div class="clearfix"></div> 
				  <div class="space-20"></div> </div>
				  <div class="payment-ul ng-hide" style="padding-bottom:20px" ng-show="check_payment_type('Wallet')"> 
				  <div class="col-sm-6"><span>Choose your Wallet</span></div> <div class="clearfix"></div> 
				  <ul class="wallet-name"> 
				  <!-- ngRepeat: wallet in valid_wallet -->
				  <li class="ng-scope" ng-repeat="wallet in valid_wallet"> 
				  <div ng-click="select_wallet(wallet.name)"> 
				  <img class="ng-hide" ng-show="is_wallet_selected(wallet.name)" src="images/tick.fe3ef458.png" style="z-index: 2;position:absolute"> 
				  <img src="images/paytm.c5e7436d.png" ng-src="images/paytm.c5e7436d.png" alt="PayTm" style="z-index: 1" height="60"> </div> 
				  <label class="ng-binding" style="font-weight:100"> PayTm </label> </li>
				  <!-- end ngRepeat: wallet in valid_wallet -->
				  <li class="ng-scope" ng-repeat="wallet in valid_wallet"> 
				  <div ng-click="select_wallet(wallet.name)"> 
				  <img class="ng-hide" ng-show="is_wallet_selected(wallet.name)" src="images/tick.fe3ef458.png" style="z-index: 2;position:absolute"> 
				  <img src="images/citrus.294e9d5e.png" ng-src="images/citrus.294e9d5e.png" alt="Citrus" style="z-index: 1" height="60"> </div> 
				  <label class="ng-binding" style="font-weight:100"> Citrus </label> </li>
				  <!-- end ngRepeat: wallet in valid_wallet -->
				  <li class="ng-scope" ng-repeat="wallet in valid_wallet">
				  <div ng-click="select_wallet(wallet.name)"> 
				  <img class="ng-hide" ng-show="is_wallet_selected(wallet.name)" src="images/tick.fe3ef458.png" style="z-index: 2;position:absolute">
				  <img src="images/mobikwik.47ab44c5.png" ng-src="images/mobikwik.47ab44c5.png" alt="Mobikwik" style="z-index: 1" height="60"> 
				  </div> <label class="ng-binding" style="font-weight:100"> Mobikwik </label> </li>
				  <!-- end ngRepeat: wallet in valid_wallet -->
				  <li class="ng-scope" ng-repeat="wallet in valid_wallet"> 
				  <div ng-click="select_wallet(wallet.name)"> 
				  <img class="ng-hide" ng-show="is_wallet_selected(wallet.name)" src="images/tick.fe3ef458.png" style="z-index: 2;position:absolute">
				  <img src="images/ola_money.d8db81b7.png" ng-src="images/ola_money.d8db81b7.png" alt="Ola Money" style="z-index: 1" height="60"> </div> 
				  <label class="ng-binding" style="font-weight:100"> Ola Money </label> </li>
				  <!-- end ngRepeat: wallet in valid_wallet --> </ul>
				  <div class="col-sm-12"> 
				  <input ng-disabled="isClicked" ng-click="payment_validate('Wallet')" id="walletPaymentButton" value="Make Payment" class="next-step radius-6" type="button"> </div> </div> </div> 
				  <div class="modal fade ng-isolate-scope" id="promo-code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" modal-show="" modal-visible="show_invalid_code"> 
				  <div class="modal-dialog modal-dialog-small" role="document">
				  <div class="modal-content"> 
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <img src="images/close.47cfd871.png" alt=""></button> 
				  <div class="panel-signin"> <div class="space-50"></div> 
				  <div class="clearfix"></div> 
				  <h2>Coupon Code Invalid</h2>
				  <div class="clearfix"></div> <p class="ng-binding"></p>
				  <div class="clearfix"></div> 
				  <div class="space-50"></div> 
				  <div class="col-sm-12 center-block"> 
				  <div class="col-sm-7 col-sm-push-3">
				  <input data-dismiss="modal" value="OK" class="next-step radius-3 height-btn" type="button"> </div> </div> 
				  <div class="clearfix"></div> <div class="space-50"></div> </div> </div> </div> </div> 
				  <div class="modal fade ng-isolate-scope" id="errorDialog" tabindex="-1" role="dialog" modal-show="" modal-visible="show_error_modal">
				  <div class="modal-dialog"> <!-- Modal content--> 
				  <div class="modal-content"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <img src="images/close.47cfd871.png" alt=""></button> 
				  <div class="panel-signin text-center">
				  <div class="space-50"></div> 
				  <div class="clearfix"></div>
				  <h4 class="ng-binding"> testing</h4> 
				  <div class="clearfix"></div> <div class="space-20"></div> 
				  <div class="space-10"></div> <div class="col-sm-12 center-block">
				  <div class="col-sm-7 col-sm-push-3"> 
				  <input data-dismiss="modal" value="OK" class="next-step radius-3 height-btn" type="button"> </div> </div> 
				  <div class="clearfix"></div> 
				  <div class="space-50"></div> </div> </div> </div> </div>
				  <select class="ng-hide" ng-show="false" id="citrusAvailableOptions">
				  <option value="CID001">ICICI Bank</option>
				  <option value="CID002">AXIS Bank</option>
				  <option value="CID004">YES Bank</option>
				  <option value="CID006">Deutsche Bank</option>
				  <option value="CID007">Union Bank</option>
				  <option value="CID011">IDBI Bank</option>
				  <option value="CID009">Federal Bank</option>
				  <option value="CID012">State Bank of Hyderabad</option>
				  <option value="CID013">State Bank of Bikaner and Jaipur</option>
				  <option value="CID014">State Bank of Mysore</option>
				  <option value="CID015">State Bank of Travancore</option>
				  <option value="CID010">HDFC Bank</option>
				  <option value="CID005">SBI Bank</option>
				  <option value="CID008">Indian Bank</option>
				  <option value="CID016">Andhra Bank</option>
				  <option value="CID019">Bank of India</option>
				  <option value="CID021">Bank of Maharashtra</option>
				  <option value="CID045">Catholic Syrian Bank</option>
				  <option value="CID023">Central Bank of India</option>
				  <option value="CID024">City Union Bank</option>
				  <option value="CID025">Corporation Bank</option>
				  <option value="CID026">DCB Bank Personal</option>
				  <option value="CID027">Indian Overseas Bank</option>
				  <option value="CID028">IndusInd Bank</option>
				  <option value="CID031">Karnataka Bank</option>
				  <option value="CID032">Karur Vysya Bank</option>
				  <option value="CID033">Kotak Mahindra Bank</option>
				  <option value="CID036">PNB Corporate</option>
				  <option value="CID037">South Indian Bank</option>
				  <option value="CID041">United Bank of India</option>
				  <option value="CID042">Vijaya Bank</option>
				  <option value="CID043">State Bank of Patiala</option>
				  <option value="CID044">PNB Retail</option>
				  <option value="CID051">Canara Bank</option>
				  <option value="CID053">Cosmos Bank</option>
				  <option value="CID070">UCO Bank</option>
				  <option value="CID080">Axis Corporate Bank</option></select>
				  <form class="ng-pristine ng-valid ng-hide" ng-show="false"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusFirstName" ng-model="customer_name"> 
				  <input id="citrusLastName" value="">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusEmail" ng-model="customer_email"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusStreet1" ng-model="select_address_line">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusStreet2" ng-model="select_address_landmark"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusCity" ng-model="select_address_locality"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusMobile" ng-model="customer_phone_no">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusAmount" ng-model="citrus_final_price"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusMerchantTxnId" ng-model="merchantTxnId">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusSignature" ng-model="signature"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusReturnUrl" ng-model="returnUrl"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusNotifyUrl" ng-model="notifyUrl"> 
				  <input id="citrusCustomParamCount" value="8" type="hidden"> 
				  <!--Custom parameter Name--> 
				  <input id="citrusCustomParamsName1" value="sessionId"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusCustomParamsValue1" ng-model="session_id"> 
				  <!--Custom parameter value-->
				  <input id="citrusCustomParamsName2" value="addressId"> 
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusCustomParamsValue2" ng-model="select_address"> 
				  <!--Custom parameter value-->
				  <input id="citrusCustomParamsName3" value="currencyRedeem">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusCustomParamsValue3" ng-model="currency_used"> <
				  !--Custom parameter value--> 
				  <input id="citrusCustomParamsName4" value="platform">
				  <input id="citrusCustomParamsValue4" value="web"> <!--Custom parameter value--> 
				  <input id="citrusCustomParamsName5" value="channel">
				  <input id="citrusCustomParamsValue5" value="web">
				  <!--Custom parameter value--> 
				  <input id="citrusCustomParamsName6" value="outletServiceType">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusCustomParamsValue6" ng-model="citrusOutletServiceType">
				  <!--Custom parameter value-->

				  <input id="citrusCustomParamsName7" value="orderTime">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusCustomParamsValue7" ng-model="server_returned_preorder_time"> 
				  <!--Custom parameter value-->
				  <input id="citrusCustomParamsName8" value="cashOrderId">
				  <input class="ng-pristine ng-untouched ng-valid" id="citrusCustomParamsValue8" ng-model="server_returned_cash_order_id">
				  <!--Custom parameter value-->
				  </form>
				  
								
								 
								</div> 
								</div>
								</div>
								</div>
								</div>
								</div>

				  
				  
				
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
	  <button class="Footerbutton1" onclick="parent.open('https://www.facebook.com/')"><i class="fa fa-facebook-square" ></i></button>
	  <button class="Footerbutton2" onclick="parent.open('https://www.youtube.com/')"><i class="fa fa-youtube" ></i></button>
	  <button class="Footerbutton3" onclick="parent.open('https://www.twitter.com/')"><i class="fa fa-twitter-square" ></i></button>
	  </p></div>

</div>
</div>



</div>




<script src="cart.js"></script>

</body>

</html>

<?php 
session_start();
require_once '../includes/class.user.php';
$user = new USER();
$user_login = new USER();



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="track.css">
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
	<button onclick="aut" class="google-btn"><i class="fa fa-google-plus"></i> Sign in with Google+</button> 
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





<section> 
<div class="container white-bg">
 <div class="profile-bg" ng-show="no_order" style=""> 
 <div align="center"> 
 <div class="space-50"></div> <div class="row">
 <div align="center"><img src="images/pastorder_back.2a92f139.png" alt="" height="200"></div> </div> <div class="row"> <h3 class="text-center fontsize regular">NO ORDER TO TRACK</h3></div> <div class="row"> <div style="text-align:center"> <input value="ORDER NOW!" class="okay-btn text-center radius-3" ng-click="redirect_to_menu()" type="button"> </div> </div> <div class="clearfix"></div> <div class="space-50"></div> </div> </div> 
 <div class="profile-bg ng-hide" ng-hide="no_order" style=""> <div class="space-50"></div>

 <h3 class="text-center fontsize regular">YOUR ORDERS </h3> <br>
 <div class="dropdown text-center dropdown-icon-hover"> <div href="" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <label ng-show="show_selected" style="font-weight: normal" class="ng-binding ng-hide">  @ null, null null,null </label> <label ng-hide="show_selected" style="font-weight: normal; cursor:pointer" class="">Select Order to Track</label> <a href="" style="margin-left:10px"><img src="images/red-arrow.0052bc42.png" alt="" type="button"> </a> </div> <ul class="dropdown-menu dropdown-menu3" aria-labelledby="dropdownMenu3"> 
 
 <!-- ngRepeat: order_tracker in order_trackers -->
 </ul> </div> 
 <div class="space-20"></div> <div class="clearfix"></div> <div ng-show="isOrderSelected" class="ng-hide"> <section class="black-menu"> <div class="delivery"> <ul> <li class="active"> <a href="" id="orderStatusOption" data-toggle="tab" data-target="#order-status" ng-init="selectedOrderStatus=1" ng-class="{selected : selectedOrderStatus===1}" ng-click="selectTab('status')" class="selected">Order Status</a> </li> <li><a href="" id="orderSummaryOption" data-toggle="tab" data-target="#order-summary" ng-init="selectedOrderSummary=0" ng-class="{selected : selectedOrderSummary===1}" ng-click="selectTab('summary')">Order Summary</a></li> <button type="submit" class="btn btn-danger pull-right ng-hide" ng-show="selected_order.is_order_cancellable" ng-click="confirmation()" style="margin-top:10px">Cancel</button> <button class="coming-soon next-step radius-6 pull-right ng-hide" style="margin-top:3px;font-weight:100" data-toggle="tab" data-target="#payments" ng-show="pay_on_delivery.available" ng-click="pay_on_delivery()">Pay Now</button> <!-- ngIf: show_phone_number --> </ul> </div> </section> </div> <div class="space-50"></div> <div class="tab-content ng-hide" ng-show="isOrderSelected"> <div class="tab-pane active ng-hide" id="order-status" ng-show="show_first_tab_content" align="center"> <div><img class="img-responsive" alt=""></div> </div> <div class="tab-pane" id="order-summary" align="center"> <div class="modal-content"> <div class="col-sm-12 black" style="padding:10px 60px"> Item List </div> <div class="clearfix"></div> <div class="space-50"></div> <div class="table-order"> <table class="table-row"> <colgroup><col width="10%"> <col width="80%"> <col width="10%"> </colgroup><tbody>
 <!-- ngRepeat: item in order_summary.items --> 
 <tr> 
 <td colspan="3">
 <div class="hr"></div> </td> </tr> </tbody></table> <div align="right"> <table class="table-row"> <tbody><tr> <td><span class="text-left"><span class="bold ng-binding" style="font-size:24px; color:#323232"></span> Items</span> </td> <td class="text-right ng-binding" style="float:right"><span class="span">Sub Total</span> <span class="light-gray"><sup>₹</sup></span> </td> </tr> <tr ng-show="order_summary.discount_applied" class="ng-hide"> <td></td> <td class="text-right" style="float:right"><span class="span ng-binding" style="color:red; width:300px">Discount()</span> <span class="light-gray"><sup>₹</sup></span><span style="color:red" class="ng-binding">  </span></td> </tr> <tr ng-show="show_currency_redeem" class="ng-hide"> <td></td> <td class="text-right" style="float:right"><span class="span" style="color:red; width:300px">Currency Redeem</span> <span class="light-gray"><sup>₹</sup></span><span style="color:red" class="ng-binding">  </span></td> </tr> <tr> <td></td> <!-- ngRepeat: service_charge in order_summary.outlet_service_charges --> </tr> </tbody></table> </div> </div> <div class="space-10"></div>  <div class="yellow-bg"> <div class="table-order"> <table class="table-row"> <tbody><tr> <td class="td-width"> <span class="bold" style="font-size:24px; color:#323232">TOTAL</span></td> <td class="text-right" style="float:right"><span class="light-gray"><sup style="font-size:24px; color:#323232; top:0.1em">₹ </sup> </span><span class="bold ng-binding" style="font-size:24px; color:#323232"></span></td> </tr> </tbody></table> </div> </div> <br> <div class="clearfix"></div> <div class="space-20"></div> <div ng-show="show_cashback" class="text-center ng-hide" style="font-size:20px;font-weight:100; color:#323232"> <div><span class="span">Cashback(available after delivery) -</span> <span class="light-gray"><sup>₹</sup></span><span class="ng-binding">  </span></div> </div> <div class="space-20"></div> <div class="clearfix"></div> </div> </div> <div class="tab-pane ng-hide" id="payments" ng-show="pay_on_delivery.available"> <div class="modal-content"> <div class="col-sm-12 black" style="padding:10px 60px;text-align:center">Make Payment <div class="pay-on-del-price pull-right ng-binding"> ₹  </div> </div> <div class="clearfix"></div>
 <payments payment-method="payment_method" payment-methods="allowed_payment_methods" take-away="takeAway" show-coupon-applied="show_coupon_applied" promo-code="promo_code" final-price="final_price" total-cart-quanity="total_cart_quantity" select-address="select_address" allowed-cashback="allowed_cashback" currency-used="currency_used" preorder-availibility="preorder_availibility" is-preorder-time-selected="is_preorder_time_selected" selected-preorder-time="selectedPreorderTime" pay-on-delivery-params="pay_on_delivery" total-payable-without-discount="total_payable_without_discount_coupon" total-payable="total_payable_coupon" class="ng-isolate-scope"><div class="panel-body"> <div class="payment-ul" style="padding-bottom:0px"> <div class="col-sm-6"><span>Choose the payment mode</span></div> <div class="clearfix"></div> <ul id="paymentMethods"> <li ng-show="is_present_in_outlet('Card')" class="ng-hide"> <input ng-model="payment_method" value="Card" name="radio_dark" id="radio23" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Card')" type="radio"> <label id="Card" for="radio23" class="css-label radGroup23">Card Payment</label> </li> <li ng-show="is_present_in_outlet('Cash')" class="ng-hide"> <input ng-model="payment_method" value="Cash" name="radio_dark" id="radio21" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Cash')" type="radio"> <label id="Cash" for="radio21" class="css-label radGroup23">Cash Payment</label> </li> <li ng-show="is_present_in_outlet('Net Banking')" class="ng-hide"> <input ng-model="payment_method" value="Net Banking" name="radio_dark" id="radio22" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Net Banking')" type="radio"> <label id="Net" for="radio22" class="css-label radGroup23">Net Banking</label> </li> <li ng-show="is_present_in_outlet('Wallet')" class="ng-hide"> <input ng-model="payment_method" value="Wallet" name="radio_dark" id="radio24" class="css-checkbox ng-pristine ng-untouched ng-valid" ng-click="check_valid_coupon('Wallet')" type="radio"> <label id="Wallet" for="radio24" class="css-label radGroup23">Wallet</label> </li> </ul> </div> <div class="yellow-bg payment" ng-show="!pay_on_delivery_params.hide_coupon_panel"> <div class="space-20"></div> <div class="row"> <div class="col-md-6 panel-signin panel-signin-promo ng-hide" ng-show="show_box8_currency() &amp;&amp; !cash_currency_msg"> <div class="text-center box8-money-red"> <input ng-click="currency_click()" name="checkbox" id="checkboxG33" class="css-checkbox" type="checkbox"> <label for="checkboxG33" class="background-remove css-label box8-money-red"> <font class="ng-binding" color="#da3939 ">Use ₹ Box8 Money</font> </label> </div> </div> <div class="col-md-6 panel-signin panel-signin-promo ng-hide" ng-show="cash_currency_msg"> <div class="text-center box8-money-red"> <label class="Box8-money-red"> <font color="#da3939 ">Box8 Money is not applicable for cash payment</font> </label> </div> </div> <div class="col-md-6" ng-hide="show_coupon_applied">
 <div class="promo-style text-center"> <input ng-model="promo_code" class="input-promo-coupon radius-3 ng-pristine ng-untouched ng-valid" placeholder="Enter your promo code here" ng-disabled="pay_on_delivery_params.available" type="text"> 
 <!-- ngIf: !pay_on_delivery_params.available -->
 <input ng-if="!pay_on_delivery_params.available" ng-click="apply_coupon()" value="Apply" class="input-apply-btn radius-3 ng-scope" type="button"><!-- end ngIf: !pay_on_delivery_params.available --> </div> </div> <div class="col-md-6 ng-hide" ng-show="show_coupon_applied"> <div class="promo-style text-center"> <div><span class="ng-binding">Your Total Bill is <span class="strike ng-binding ng-hide" ng-show="show_strike_off()">₹&nbsp;&nbsp;</span> ₹</span> </div> <input ng-model="promo_code" class="input-promo-coupon radius-3 ng-pristine ng-untouched ng-valid" placeholder="Enter your promo code here" readonly="" type="text"> <!-- ngIf: !pay_on_delivery_params.available --><input ng-if="!pay_on_delivery_params.available" ng-click="remove_coupon()" value="Remove" class="input-apply-btn radius-3 ng-scope" type="button">
 
 <!-- end ngIf: !pay_on_delivery_params.available -->
 </div> </div> </div>

 <div class="clearfix"></div> <div class="space-20"></div> </div> <!-- cash payment --> <div class="payment-ul ng-hide" style="padding-bottom:20px" ng-show="check_payment_type('Cash')"> <div class="col-sm-6"><span>Bring change of</span></div> <div class="clearfix"></div> <ul> <li> <input ng-value="50" name="change_label" id="radio26" class="css-checkbox" ng-checked="true" value="50" checked="checked" type="radio"> <label for="radio26" class="css-label radGroup1 radGroup2">₹50/-</label> </li> <li> <input ng-value="100" name="change_label" id="radio27" class="css-checkbox" value="100" type="radio"> <label for="radio27" class="css-label radGroup1 radGroup2">₹100/-</label> </li> <li> <input ng-value="500" name="change_label" id="radio28" class="css-checkbox" value="500" type="radio"> <label for="radio28" class="css-label radGroup1 radGroup2">₹500/-</label> </li> <li> <input ng-value="1000" name="change_label" id="radio29" class="css-checkbox" value="1000" type="radio"> <label for="radio29" class="css-label radGroup1 radGroup2 removechk">₹1000/-</label> </li> </ul> <div class="col-sm-12"> <input ng-init="isClicked=false" ng-disabled="isClicked" ng-click="payment_validate('Cash')" value="Make Payment" class="next-step radius-6" type="button"> </div> <div class="clearfix"></div> <div class="space-20"></div> </div> 
 
 <!-- card payment -->
 <!--<div ng-show="check_payment_type('Card')" class="ng-hide"> <div class="delivery-pad" ng-hide="show_card_form"> <div class="col-sm-6 width50"><span>Your card</span></div> <div class="col-sm-6 width50"> <input ng-click="toggle_show_card_form()" value="Add new card" class="show-all-btn radius-3" type="button"> </div> <div class="clearfix"></div> <div class="col-sm-12 cards-margin"> <!-- ngRepeat: used_card in $root.used_cards | filter: getCreditDebitCards --> <!--</div> <div class="clearfix"></div> <div class="space-20"></div> <input ng-disabled="isClicked" ng-click="payment_validate('used_card')" value="Make Payment" class="coming-soon next-step radius-6" type="button"> </div> <div class="payment-ul ng-hide" ng-show="show_card_form"> <div class="col-sm-6 width50"><span>Add New Card</span></div> <div class="col-sm-6 width50"> <input ng-click="toggle_show_card_form()" value="Show all" class="show-all-btn radius-3" type="button"> </div> <div class="clearfix"></div> <ul id="citrusCardType"> <li class="" ng-click="assign_card('debit')"> <input name="radiog_dark" id="radio66" class="css-checkbox" type="radio"> <label for="radio66" class="css-label radGroup29 debitradio">Debit Card</label> </li> <li class="" ng-click="assign_card('credit')"> <input name="radiog_dark" id="radio64" class="css-checkbox" type="radio"> <label for="radio64" class="css-label radGroup29 creditradio">Credit Card</label> </li> </ul> <select ng-show="false" id="citrusScheme" class="ng-hide"> <option value="VISA">VISA</option> <option value="mastercard">MASTER</option> <option value="amex">AMEX</option> <option value="rupay">RUPAY</option> </select> <div class="col-sm-12 col-md-12 payment-card"> <div class="col-sm-2 col-md-1"> <div class="floating-placeholder float:left"> <img ng-src="images/dummy.d4ece676.png" alt="" src="images/dummy.d4ece676.png" height="30"> </div> </div> <div class="col-xs-12 col-sm-12 col-md-3"> <div class="floating-placeholder"> <input name="name" id="citrusNumber" ng-model="new_card_number" class="input1 ng-pristine ng-untouched ng-valid" type="text"> <label for="name">Card Number</label> </div> </div> <div class="col-xs-12 col-sm-12 col-md-2"> <div class="floating-placeholder"> <input name="name" id="citrusCardHolder" class="input1" type="text"> <label for="name">Name</label> </div> </div> <div class="col-xs-12 col-sm-12 col-md-4"> <div style="width:50%; float:left"> <div class="floating-placeholder"> <input name="name" class="input1" disabled="" type="text"> <label for="name">Expiration</label> </div> </div> <div style="width:20%; float:left"> <div class="floating-placeholder"> <input id="expiry_month" name="name" min="1" max="12" maxlength="2" class="input1" type="text"> <label for="name">MM</label> </div> </div> <div style="width:20%; float:left"> <div class="floating-placeholder"> <input id="expiry_year" name="name" min="1" max="99" maxlength="2" class="input1" type="text"> <label for="name">YY</label> </div> </div> <div ng-show="false" style="width:0%; float:left" class="ng-hide"> <div class="floating-placeholder"> <input name="name" maxlength="2" id="citrusExpiry" class="input1" type="text"> <label for="name">Date</label> </div> </div> </div> <div class="col-xs-12 col-sm-12 col-md-2"> <div class="floating-placeholder" style="width:40%"> <input name="name" maxlength="4" id="citrusCvv" class="input1" type="password"> <label for="name">CVV</label> </div> </div> </div> <div class="clearfix"></div> <div class="space-20"></div> <div class="clearfix"></div> <div class="space-20"></div> <div class="col-sm-12"> <input ng-disabled="isClicked" ng-click="payment_validate('card')" id="citrusCardPayButton" value="Make Payment" class="next-step radius-6" type="button"> </div> <div class="clearfix"></div> <div class="space-20"></div> </div> </div> <!-- net banking --> <!--<div class="payment-ul ng-hide" style="padding-bottom:20px" ng-show="check_payment_type('Net Banking')"> <div class="col-sm-6"><span>Choose your Bank</span></div> <div class="col-sm-6 bank"> <label class="pull-right">Select other bank <select id="select_bank" ng-model="dropdown_value" onchange="assign_bank_dropdown()" class="ng-pristine ng-untouched ng-valid"><option value="? undefined:undefined ?"></option> <!-- ngRepeat: bank in valid_bank --><!-- </select> </label> </div> <div class="clearfix"></div> <ul class="bank-name"> <!-- ngRepeat: bank in valid_bank|limitTo:5 --> <!--</ul> <div class="col-sm-12"> <input ng-disabled="isClicked" ng-click="payment_validate('net')" id="citrusNetbankingButton" value="Make Payment" class="next-step radius-6" type="button"> </div> <div class="clearfix"></div> <div class="space-20"></div> </div> <div class="payment-ul ng-hide" style="padding-bottom:20px" ng-show="check_payment_type('Wallet')"> <div class="col-sm-6"><span>Choose your Wallet</span></div> <div class="clearfix"></div> <ul class="wallet-name"> <!-- ngRepeat: wallet in valid_wallet --> <!--</ul> <div class="col-sm-12"> <input ng-disabled="isClicked" ng-click="payment_validate('Wallet')" id="walletPaymentButton" value="Make Payment" class="next-step radius-6" type="button"> </div> </div> </div> <div class="modal fade ng-isolate-scope" id="promo-code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" modal-show="" modal-visible="show_invalid_code"> <div class="modal-dialog modal-dialog-small" role="document"> <div class="modal-content"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="images/close.47cfd871.png" alt=""></button> <div class="panel-signin"> <div class="space-50"></div> <div class="clearfix"></div> <h2>Coupon Code Invalid</h2> <div class="clearfix"></div> <p class="ng-binding"></p> <div class="clearfix"></div> <div class="space-50"></div> <div class="col-sm-12 center-block"> <div class="col-sm-7 col-sm-push-3"> <input data-dismiss="modal" value="OK" class="next-step radius-3 height-btn" type="button"> </div> </div> <div class="clearfix"></div> <div class="space-50"></div> </div> </div> </div> </div> <div class="modal fade ng-isolate-scope" id="errorDialog" tabindex="-1" role="dialog" modal-show="" modal-visible="show_error_modal"> <div class="modal-dialog"> <!-- Modal content--> <!--<div class="modal-content"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="images/close.47cfd871.png" alt=""></button> <div class="panel-signin text-center"> <div class="space-50"></div> <div class="clearfix"></div> <h4 class="ng-binding"> testing</h4> <div class="clearfix"></div> <div class="space-20"></div> <div class="space-10"></div> <div class="col-sm-12 center-block"> <div class="col-sm-7 col-sm-push-3"> <input data-dismiss="modal" value="OK" class="next-step radius-3 height-btn" type="button"> </div> </div> <div class="clearfix"></div> <div class="space-50"></div> </div> </div> </div> </div> <div class="modal fade ng-isolate-scope" data-keyboard="false" data-backdrop="static" id="couponErrorDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" modal-show="" modal-visible="show_coupon_remove_modal"> <div class="modal-dialog modal-dialog-small" role="document"> <div class="modal-content"> <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="images/close.47cfd871.png" alt="" ng-click="cancel_action()"></button> --> <!--<div class="panel-signin"> <div class="space-50"></div> <div class="clearfix"></div> <!--   <h2>Discard Order</h2>
                         
						 <div class="clearfix"></div> --> 
						 <h4 class="ng-binding">Coupon applied is not valid for  Payment </h4> 
						 <div class="clearfix"></div>
						 <div class="space-50"></div> 
						 <div class="col-sm-12"> 
						 <div class="col-sm-6 width50 padding-all"> 
						 <input data-dismiss="modal" value="Cancel" class="continue-shoping radius-3 height-btn pull-right" ng-click="cancel_action()" type="button"> </div>
						 <div class="col-sm-6 width50 padding-all"> <input data-dismiss="modal" value="REMOVE" class="next-step radius-3 height-btn" ng-click="confirm_action()" type="button"> </div> </div> <div class="clearfix"></div> <div class="space-50"></div> </div> </div> </div> </div> <select ng-show="false" id="citrusAvailableOptions" class="ng-hide"><option value="CID001">ICICI Bank</option><option value="CID002">AXIS Bank</option><option value="CID004">YES Bank</option><option value="CID006">Deutsche Bank</option><option value="CID007">Union Bank</option><option value="CID011">IDBI Bank</option><option value="CID009">Federal Bank</option><option value="CID012">State Bank of Hyderabad</option><option value="CID013">State Bank of Bikaner and Jaipur</option><option value="CID014">State Bank of Mysore</option><option value="CID015">State Bank of Travancore</option><option value="CID010">HDFC Bank</option><option value="CID005">SBI Bank</option><option value="CID008">Indian Bank</option><option value="CID016">Andhra Bank</option><option value="CID019">Bank of India</option><option value="CID021">Bank of Maharashtra</option><option value="CID045">Catholic Syrian Bank</option><option value="CID023">Central Bank of India</option><option value="CID024">City Union Bank</option><option value="CID025">Corporation Bank</option><option value="CID026">DCB Bank Personal</option><option value="CID027">Indian Overseas Bank</option><option value="CID028">IndusInd Bank</option><option value="CID031">Karnataka Bank</option><option value="CID032">Karur Vysya Bank</option><option value="CID033">Kotak Mahindra Bank</option><option value="CID036">PNB Corporate</option><option value="CID037">South Indian Bank</option><option value="CID041">United Bank of India</option><option value="CID042">Vijaya Bank</option><option value="CID043">State Bank of Patiala</option><option value="CID044">PNB Retail</option><option value="CID051">Canara Bank</option><option value="CID053">Cosmos Bank</option><option value="CID070">UCO Bank</option><option value="CID080">Axis Corporate Bank</option></select> <form ng-show="false" class="ng-pristine ng-valid ng-hide"> <input id="citrusFirstName" ng-model="customer_name" class="ng-pristine ng-untouched ng-valid"> <input id="citrusLastName" value=""> <input id="citrusEmail" ng-model="customer_email" class="ng-pristine ng-untouched ng-valid"> <input id="citrusStreet1" ng-model="select_address_line" class="ng-pristine ng-untouched ng-valid"> <input id="citrusStreet2" ng-model="select_address_landmark" class="ng-pristine ng-untouched ng-valid"> <input id="citrusCity" ng-model="select_address_locality" class="ng-pristine ng-untouched ng-valid"> <input id="citrusMobile" ng-model="customer_phone_no" class="ng-pristine ng-untouched ng-valid"> <input id="citrusAmount" ng-model="citrus_final_price" class="ng-pristine ng-untouched ng-valid"> <input id="citrusMerchantTxnId" ng-model="merchantTxnId" class="ng-pristine ng-untouched ng-valid"> <input id="citrusSignature" ng-model="signature" class="ng-pristine ng-untouched ng-valid"> <input id="citrusReturnUrl" ng-model="returnUrl" class="ng-pristine ng-untouched ng-valid"> <input id="citrusNotifyUrl" ng-model="notifyUrl" class="ng-pristine ng-untouched ng-valid"> <input id="citrusCustomParamCount" value="8" type="hidden"> <!--Custom parameter Name--> <input id="citrusCustomParamsName1" value="sessionId"> <input id="citrusCustomParamsValue1" ng-model="session_id" class="ng-pristine ng-untouched ng-valid"> <!--Custom parameter value--> <input id="citrusCustomParamsName2" value="addressId"> <input id="citrusCustomParamsValue2" ng-model="select_address" class="ng-pristine ng-untouched ng-valid"> <!--Custom parameter value--> <input id="citrusCustomParamsName3" value="currencyRedeem"> <input id="citrusCustomParamsValue3" ng-model="currency_used" class="ng-pristine ng-untouched ng-valid"> <!--Custom parameter value--> <input id="citrusCustomParamsName4" value="platform"> <input id="citrusCustomParamsValue4" value="web"> <!--Custom parameter value--> <input id="citrusCustomParamsName5" value="channel"> <input id="citrusCustomParamsValue5" value="web"> <!--Custom parameter value--> <input id="citrusCustomParamsName6" value="outletServiceType"> <input id="citrusCustomParamsValue6" ng-model="citrusOutletServiceType" class="ng-pristine ng-untouched ng-valid"> <!--Custom parameter value--> <input id="citrusCustomParamsName7" value="orderTime"> <input id="citrusCustomParamsValue7" ng-model="server_returned_preorder_time" class="ng-pristine ng-untouched ng-valid"> <!--Custom parameter value--> <input id="citrusCustomParamsName8" value="cashOrderId"> <input id="citrusCustomParamsValue8" ng-model="server_returned_cash_order_id" class="ng-pristine ng-untouched ng-valid"> <!--Custom parameter value--> </form>

						 </payments> </div> </div> </div> </div> </div> </section>




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
<script src="track.js"></script>

</body>

</html>

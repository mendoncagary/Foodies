<?php
session_start();
require_once '../includes/class.user.php';
$user_login = new USER();



$user = new USER();

if(isset($_POST["action"]) == "logout")
{
if($user->is_logged_in()!="")
{
	$user->logout();	
	exit();
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="faq.css">
<link rel="stylesheet" type="text/css" href="../assets/libraries/font-awesome-4.6.3/css/font-awesome.css">
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->
<script src="../assets/libraries/jquery-3.1.0.min.js"></script>


<script src="faq.js"></script>
<title>Foodies</title>

</head>

<body onload="myFunction()">

<div id="loader"></div>

<div id="page">



<div id="header">
<nav id="innercontent">
<ul>
  <li><a id="link1" class="mainlink" href="../about/about.php">About</a></li>
  <li><a id="link2" class="mainlink" href="">Menu</a></li>
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
	<input id="btn-login" name="btn-login" value="Let me in" class="sign-up-btn" onclick="checkForm()" type="button"> 
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

<h2 class="headline"><span class="first-letter">F</span>aq</h2>
</div>
</div>

<div class="section">
<div class="container">
 <div class="space-50">
 </div> <h3 class="regular">FAQ's </h3>
  <div class="space-20"></div> 
  <div class="space-10"></div> 
<p class="bolder">How safe is credit card payment on our website?</p>
 <p class="color">Credit card payments are absolutely secure on our website. Empowered with SSL technology, our payment gateway received credit card information with 128 bit encryption. This is the safest and the most trustworthy way to make online transactions. In addition, we do not store credit card information with us, so there is zero scope of the information being leaked.</p> <hr class="hr">
 <p class="bolder">Is it safe to order products online using my credit card or checking information?</p>
  <p class="color">When making a purchase online using the credit card, it is advised to check for the little 'Lock' icon on the URL. This icon indicated that a secure transaction is taking place and your personal information will be kept confidential. The credit card information is protected by secure encryption while processing the payment. As an alternative, the customer can also check the security of the transaction by right-clicking on the web page and selecting 'Properties' from the menu. If the web address displays 'https' where the 's' denotes a secure web server, then it is safe for an online transaction.</p> <hr class="hr"> <p class="bolder">Keep your password confidential?</p>
   <p class="color">Some online purchases usually necessitate the customer to 'login' before viewing and placing an order. For this, the customers are required to enter a username and password. The customer must not share their login information with anyone. Information like birth date, maiden name or phone number should be avoided while selecting a password. The password chosen at a particular website should be different from the passwords kept at other websites. Alpha-numeric passwords with atleast 8 characters are tougher to steal.</p> <hr class="hr">
    <p class="bolder">Always print or save copies of your order</p> 
    <p class="color">After completing an online transaction, the customer will get a confirmation page that reviews their entire order. This page comprises the cost of the order, customer information, delivery information, product information and an order confirmation number. It is recommended to make a note of these details in a hard or soft copy format. The customer should store such records for a minimum period which covers return/warranty policy. The customer may also be emailed a confirmation page with above information by the merchant. It is recommended to save or print such information, including any other email correspondence with the company. </p>
     <hr class="hr">
      <p class="bolder">Steps to place an order with us </p> <ul class="ul"> <li> Enter your address to select the nearest Box8 outlet</li> <li>Choose items you want to eat and add them to your cart</li> <li>Once you have finalized your order, click on 'Checkout'</li> <li>Enter your mobile number, email and delivery details</li> <li>If you are an existing customer, your details will be automatically captured</li> <li>If you are a new customer, you would be required to undergo a small registration process. This is to ensure the authenticity of your order</li> <li>Select between 'Take Away' or 'Delivery'</li> <li class="ul-list">If you select 'Delivery', enter the delivery address. Please enter a detailed address to ensure timely delivery. For existing customers, you will be given the option to select an existing address.</li> <li>The final step gives you the option to enter a promotional coupon code if you have one. On applying the code, the updated order total will be displayed.</li> <li> Select your preferred payment method to proceed. Note that the coupon code may not work with all payment options.</li> <li>After completing the online payment, you will be re-directed back to our website which will display your order confirmation details.</li> <li>Congratulations! Your order is now place and will be delivered shortly.</li> </ul> <hr class="hr"> <p class="bolder">Third Party related queries</p> <p class="color">If you have placed an order with us through third-party aggregators like FoodPanda, TinyOwl, Zomato, etc., we recommend you get your concerns addressed directly by the respective parties. This is to ensure that your queries are thoroughly answer as the concerned parties would be in a better position to address your queries regarding their services.</p> <hr class="hr"> 
      <div class="space-50">
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
	  <a href="faq.html" style="text-decoration:none;">FAQs</a></br>
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




<!--<div id="food">
</div>
-->
</div>



<script>
//Sign up modal
var signupmodal = document.getElementById('signupModal');
var span1 = document.getElementsByClassName("close")[1];
span1.onclick = function() {
    signupmodal.style.display = "none";
};
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == signupmodal) {
        signupmodal.style.display = "none";
    }
};



// Sign in modal 

 var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("link5");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
};


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
};



// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

var acc = document.getElementsByClassName("menuaccord");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  };
}






</script>


</body>

</html>

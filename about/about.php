<?php 
session_start();
require_once '../includes/class.user.php';
$user_login = new USER();


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="about.css">
<link rel="stylesheet" type="text/css" href="../assets/libraries/font-awesome-4.6.3/css/font-awesome.css">
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->

<title>Foodies</title>

</head>

<body onload="myFunction()">

<div id="loader"></div>

<div id="page">



<div id="header">
<nav id="innercontent">
<ul>
  <li><a id="link1" class="mainlink" href="#">About</a></li>
  <li><a id="link2" class="mainlink" href="#">Menu</a></li>
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

<div class= "space-50">
</div>

<div class= "space-50">
</div>



<div class="bgimg1">
<div id="floater" style="position:absolute; right: 10%; box-shadow: 0px 0px 10px black; background: white; opacity:0.7; width: 200px; padding: 10px;">
We're <font color="red">Foodies</font>,
India's fastest growing food delivery company.  Here we try to share our vision about food quality, our mission about customer’s satisfaction and introducing services that we provide for each one of you and ensure a delightful end-to-end experience <!--every single time. Founded by DBIT graduates, we have revolutionized the Global food industry.-->
</div>


<div id="headerbox">
<h2 class="headline"><span class="first-letter">A</span>bout Us</h2>
</div>
</div>



<div class="section">

<div class="container">
 <div class="space-50">
 </div> 
  <div class="space-20"></div> 
  <div class="space-10"></div> 

 <div style="margin:auto; width: 60%;">
 
 <h2 class="regular">About Us</h2><br>
We keep one simple thing in mind when we make our food - we only serve food, that we love to eat.
Believing in product innovation, we have designed meals which are convenient to eat anytime, anywhere. We have given a menu with a fusion of Italian & western flavours & have the most authentic, indigenous taste in meals.
With an equal emphasis on technology and delivery, along with food, we make ordering food a first class experience.
What started as a small outlet in a corporate cafeteria, has now grown to 50+ outlets spread across Mumbai delivering 10000+ orders every day.
Just a few clicks on our ordering platform, and our super-fast integrated delivery management system will deliver piping hot food right at your door steps.
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
	  <a href="../faq/faq.php" style="text-decoration:none;">FAQs</a></br>
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

<script src="../assets/libraries/jquery-3.1.0.min.js"></script>


<script src="about.js"></script>

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

</script>

</body>

</html>

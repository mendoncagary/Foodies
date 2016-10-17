<?php
session_start();
require_once 'includes/class.user.php';
$user_login = new USER();
$user = new USER();

if(isset($_POST["action"]) == "logout")
{
	if($user->is_logged_in()!="")
{
	$user->logout();	
}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta  http-equiv="content-type" content="text/html" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/font-awesome-4.6.3/css/font-awesome.css">
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->

<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
<title>Foodies</title>

</head>

<body onload="myFunction()">

<div id="loader"></div>

<div id="page">



<div id="header">
<nav id="innercontent">
<ul>
  <li><a id="link1" class="mainlink" href="about/about.php">About</a></li>
  <li><a id="link2" class="mainlink" href="#news">Menu</a></li>
  <li><a id="link3" href="home.php">
		<img src="assets/images/img5.png" alt="Foodies" id="logo" height="160" width="160">
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
<a id="link6" class="icon-link"><img src="assets/images/img27.jpg" alt="lang"></a>
  
  </li>
<?php }
else{
	?>
<li>
<a id="link6" class="icon-link ng-hide"><img src="assets/images/img27.jpg" alt="lang"></a>
  
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
	<span id="email-error" class='error-text'>Enter valid email or mobile number</span>
	</div>
	
      
	 <div class="col-sm-12">
	 <div class="floating-placeholder">
	 <input id="password-input" name="txtupass" class="modalinput" onblur="validate('password-input','password-error',this.value)" type="password"> 
	 <label for="password-input">Password</label> </div>
	<!--Error text-->
	<span id="password-error" class="error-text">Password is too short(minimum is 6 character)</span> 
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
	<input id="signmebutton" name="btn-signup" value="Sign up" class="sign-up-btn" type="button"> 
	</div>
	
	<div class="clearfix"></div>
	<div class="space-15"></div>
  
	<div class="or">or</div>
	
	
	<div class="clearfix"></div>
	<div class="space-15"></div>
	
	<div class="col-sm-6"> 
	<button onclick="" class="facebook-btn">
	<i class="fa fa-facebook"></i> Sign in with Facebook</button>
	</div>
	
	<div class="col-sm-6"> 
	<button onclick="" class="google-btn"><i class="fa fa-google-plus"></i> Sign in with Google+</button> 
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

<video autoplay="" loop="" muted="" preload="auto" class="video-item">
<source src="assets/videos/risotto-video01.mp4" type="video/mp4">
Your browser does not support the video tag. I suggest you upgrade your browser.</video>

<div id="headerbox">
<h2 class="headline"><span class="first-letter">W</span>elcome</h2>
</div>



<a id="scrolldown">
<div id="scrollTitle">SCROLL DOWN</div>
<img id="scrollbutton"  src="assets/images/img8.png">
</a>

</div>



<div id="section1">

<div class="space-100">
</div>

<div class="aboutgrid">

<h2 class = "headline-secondary">
<span class="first-letter">D</span>
iscover
</h2>

<h1 class="headline-primary">Our Story</h1>

<p style="text-align: center;">
Foodies is a an online marketplace for your favourite food. We have the widest range of restuarants in India. We believe food is a pleasure and food ordering should be fast and definitely a fun experience.</p>
 
 <p style="text-align: center;"><a class="aboutcode" href="about/about.php">About Us</a></p>
</div>
 </div>

<div class="bgimg2">

</div>


<div id="section2">

<!--<button onclick="getLocation()">Try It</button>
<p id="demo"></p>-->

<input type="hidden" id="pincodespan"></input>

<div class="row">
<div class="search">
	 <div class="search-inner"> 
	 	
              <div class="input-bar">
              	 <div class="search-img col-md-1"></div> 
              	 
				 <span class="landing-page-input">
              	 	<a href="" ng-click="toggleDiv()">
              	 		
              	 		</a> 
              	 		</span> 
					<form method="post">
              	 		<input autocomplete="" value="" class="input-search" id="googleAutoCompleteBox" placeholder="Delivery Location e.g. Marine Drive, Mumbai" details="localityDetails" options="options" type="text"> </div> 
						
						
						<div class="float-spinner">
              	 			<img class="rot" src="assets/images/img19.png" alt=""></div>
							<div class="clearfixall"></div>
             
              	 			  <div class="padding-order-now col-md-2" onclick="validateplace()"> 
              	 			  	<button type="button" style="border: 0px" class="order-now"> &nbsp; ORDER NOW</button> 
              	 			  	</div> 
              	 			  	<div class="padding-locate-me col-md-2"> 
              	 			  		<button type="button" onclick="getLocation()" class="locate-me">
              	 			  			<i class="fa fa-location-arrow search-arrow"></i> &nbsp; LOCATE ME</button>
              	 			  			 </div> 
									
              	 			  			</form>
              	 			  			 </div> 
              	 			  			 </div>






</div>


</div>

<div class="bgimg3">

</div>

<div id="section3">

<section class="article__content">
<div class="container">
 <section class="page__content  js-post-gallery  cf"><div class="pixcode  pixcode--grid  grid  "><div class="grid__item six-twelfths palm-one-whole ">
 <style type="text/css">#gallery-0{margin:auto}#gallery-0 .gallery-item{float:left;text-align:center;width:50%}</style>
 
 <div id="gallery-0" class="gallery galleryid-15 gallery-columns-2 gallery-size-medium">
 <figure class="gallery-item">
 <div class="gallery-icon landscape"> 
 <a data-title="menu-thumb-6" data-alt="" href="assets/images/img29.png">
 <img src="assets/images/img29.png" class="attachment-medium" alt="menu-thumb-6" width="300" height="218"></a></div></figure>
 <figure class="gallery-item">
 <div class="gallery-icon landscape"> <a data-title="menu-thumb-2" data-alt="" href="https://demos-pgm.netdna-ssl.com/demos/rosa/wp-content/uploads/2014/05/menu-thumb-2.jpg"><img src="https://demos-pgm.netdna-ssl.com/demos/rosa/wp-content/uploads/2014/05/menu-thumb-2-300x218.jpg" class="attachment-medium" alt="menu-thumb-2" width="300" height="218"></a></div></figure><figure class="gallery-item"><div class="gallery-icon landscape">
 <a data-title="menu-thumb-1" data-alt="" href="https://demos-pgm.netdna-ssl.com/demos/rosa/wp-content/uploads/2014/05/menu-thumb-1.jpg"><img src="https://demos-pgm.netdna-ssl.com/demos/rosa/wp-content/uploads/2014/05/menu-thumb-1-300x218.jpg" class="attachment-medium" alt="menu-thumb-1" width="300" height="218"></a></div></figure><figure class="gallery-item"><div class="gallery-icon landscape">
 <a data-title="menu-thumb-4" data-alt="" href="https://demos-pgm.netdna-ssl.com/demos/rosa/wp-content/uploads/2014/05/menu-thumb-4.jpg"><img src="https://demos-pgm.netdna-ssl.com/demos/rosa/wp-content/uploads/2014/05/menu-thumb-4-300x218.jpg" class="attachment-medium" alt="menu-thumb-4" width="300" height="218">
 </a></div></figure></div></div></div></section></div></section>

</div>

  <div class="bgimg4">
  </div>

  

<section class="video-sec" >
<div class="wpb_row vc_row-fluid full-row">
<div class="spattern">



</div></div></section>



<div class="footer">
<div class="footercontent">
    <div class="col">
      <h4>Company</h4>
	  <a href="#">How it works</a></br>
	  <a href="../contact.php">Contact</a></br>
	  <a href="#">Team</a></br>
	  <a href="faq/faq.php">FAQs</a></br>
	  <a href="#">Careers</a></br>
	  </div>
    <div class="col">
      <h4>Legal</h4>
	  <a href="#">Terms & Conditions </a></br>
	  <a href="#">Quality Control </a></br>
	  <a href="#">Privacy Policy</a></br>
	  
	  </div>
    
 
    <div class="col">
      <h4>Menu</h4>
	  <a href="#">All Day Menu</a> </br>
	  <a href="#">Lunch</a></br>
	  <a href="#">Dinner</a></br>
	  <a href="#">Flavours</a></br>
	  <a href="#">Sitemap</a>
	  
	  </div>
    <div class="col">
      <h4>Stay tuned</h4>
	  Connect with us and stay updated!</br>
	  <p>
	  <button class="Footerbutton1" onclick="parent.open('https://www.facebook.com/')"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></button>
	  <button class="Footerbutton2" onclick="parent.open('https://www.youtube.com/')"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></button>
	  <button class="Footerbutton3" onclick="parent.open('https://www.twitter.com/')"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></button>
	  </p></div>

</div>
</div>

</div>
<script src="assets/libraries/jquery-3.1.0.min.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBKGVbFuHnb8ObXEyfMu8uin5YlMiM4zU&libraries=places&region=in"></script>
<script type="text/javascript"  src="script.js"></script>



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

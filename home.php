<?php
session_start();
require_once 'includes/class.user.php';
$user_login = new USER();



if(isset($_GET['logout']))
{
$user_login->logout();
}

$reg_user = new USER();

if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['regname']);
	$email = trim($_POST['regemail']);
	$upass = trim($_POST['regpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to Foodies!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://localhost/Foodies/includes/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
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
  <li><a id="link1" class="mainlink" href="about/about.html">About</a></li>
  <li><a id="link2" class="mainlink" href="#news">Menu</a></li>
  <li><a id="link3" href="home.php">
		<img src="assets/images/img5.png" alt="Foodies" id="logo" height="160" width="160">
      </a></li>
  <li><a id="link4" class="mainlink" href="#contact">Offers</a></li>
	<li>
	<?php
		if($user_login->is_logged_in()!="")	
		{
	?>
		<a id="link5" class="mainlink">Welcome</a>
	<?php
		}
		else
		{
	?>
		<a id="link5" class="mainlink">Sign In</a>
	
	<?php
		}

		if(isset($_POST['btn-login']))
		{
		$email = trim($_POST['txtemail']);
		$upass = trim($_POST['txtupass']);
	
		if($user_login->login($email,$upass))
		{
	?>
		<a id="link5" class="mainlink">Welcome</a>
	<?php
		}
		}
	?>
</li>

	
	<?php
	if($user_login->is_logged_in()!="")	
		{
	?>
	
<li>
<a id="link6" class="icon-link"><img src="assets/images/img27.jpg" alt="lang"></a>
  
  </li>
  <?php
		}?>
  </ul>
 	<?php
	if($user_login->is_logged_in()!="")	
		{

 ?>
 <ul id="box-signin">
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

  <?php } ?>  
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
 
 <p style="text-align: center;"><a class="aboutcode" href="about/about.html">About Us</a></p>
</div>
 </div>

<div class="bgimg2">
whats cooking
</div>


<div id="section2">

<!--<button onclick="getLocation()">Try It</button>
<p id="demo"></p>-->



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
              	 		<input autocomplete="off" value="" class="input-search" id="googleAutoCompleteBox" placeholder="Delivery Location e.g. Marine Drive, Mumbai" details="localityDetails" options="options" type="text"> </div> 
						
						
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
nothing
</div>

<div id="section3">

<div id="wrapper">
<h2 id="menutitle">Our Menu</h2>

<ul class="menutext">
					<li class="a-1">
						<a href="/" class="menuaccord">Entrées</a>
						<div class="afteraccord">
							<ul class="list-unstyled">
								<li>
									<h3>Soupe du jour <span class="vegan"></span></h3>
									<p class="price">3<sup></sup></p>
								</li>
								<li>
									<h3>Pois chiches rôtis <span class="vegan"></span></h3>
									<p>Croustillants, épicés &amp; salés</p>
									<p class="note"><span class="noix"></span>Ajout de noix torréfiées 3<sup>50</sup></p>
									<p class="price">3<sup></sup></p>
								</li>
								<li>
									<h3>Samosas Végé <span class="vegan"></span></h3>
									<p>3 beignets de pommes de terre, pois verts &amp; légumes, sauce à la mangue </p>
									<p class="price">6<sup></sup></p>
								</li>
								<li>
									<h3>Crab Cakes <span class="coeur"></span></h3>
									<p>2 croquettes 100% chair de crabe, mayo maison &amp; rémoulade céleri rave, céleri branche, chou savoie</p>
									<p class="price">10<sup></sup></p>
								</li>
								<li>
									<h3>Fish Pakora</h3>
									<p>4 morceaux de morue du Canada frits, paprika fumé, mayo maison &amp; rémoulade céleri rave, céleri branche, chou savoie</p>
									<p class="price">7<sup></sup></p>
								</li>
								<li>
									<h3>Falafels &amp; tabouleh <span class="vegan"></span></h3>
									<p>4 boules de pois chiches à l'indienne, tabouleh herbes &amp; amandes, raïta de tofu soyeux</p>
									<p class="price">7<sup></sup></p>
								</li>
								<li>
									<h3>Hummus <span class="vegan"></span></h3>
									<p>Garniture de tabouleh herbes &amp; amandes, oignons marinés, chips de dos</p>
									<p class="price">5<sup></sup></p>
								</li>
							</ul>
						</div>
					</li>
					<li class="a-2">
						<a href="/" class="menuaccord">Accompagnements</a>
						<div class="afteraccord">
							<ul class="list-unstyled">
								<li>
									<h3>Aloo Gobi <span class="vegan"></span> <span class="coeur"></span></h3>
									<p>Tranche de chou-fleur mariné, pommes de terre rôties, purée de pois verts à l'huile d'olive, bacon de coconut, pois chiches rôtis &amp; herbes fraiches.</p>
									<p class="price">13<sup></sup></p>
								</li>
								<li>
									<h3>Le Popeye</h3>
									<p>Purée d'épinards, fromage grillé à la nigelle, yogourt coriandre &amp; menthe. </p>
									<p class="price">6<sup>75</sup></p>
								</li>
								<li>
									<h3>Salade de chou-fleur <span class="vegan"></span></h3>
									<p>Mélange de chou-fleur mariné &amp; cru, chou de savoie, céleri et sésame grillé, vinaigrette au tahini &amp; citron</p>
									<p class="note"><span class="noix"></span>Ajout de noix torréfiées  3<sup>50</sup></p>
									<p class="price">11<sup></sup></p>
								</li>
							</ul>
						</div>
					</li>
					<li class="a-3">
						<a href="/" class="menuaccord">Les essentiels </a>
						<div class="afteraccord">
							<ul class="list-unstyled">
								<li>
									<h3>Dosa <span class="vegan"></span></h3>
									<p>Crêpe de lentilles et riz fermenté, craquante et aromatique</p>
									<p class="price">2<sup>85</sup></p>
								</li>
								<li>
									<h3>Naan <span class="vegan"></span></h3>
									<p>Avec beurre clarifié ou huile de coco</p>
									<p class="price">1<sup>25</sup></p>
								</li>
								<li>
									<h3>Papadum <span class="vegan"></span></h3>
									<p>Chips de farine de lentilles (frit) </p>
									<p class="price">2<sup>85</sup></p>
								</li>
								<li>
									<h3>Plateau de dégustation de trempettes</h3>
									<p>Coulis mangue au fenouil, sauce tamarin, glaze épicé, chutney de mangue, yogourt coriandre &amp; menthe*, raïta de tofu, pâte de piment</p>
									<p class="note"><span class="etoile"></span>Le yogourt peut être substitué par du taouleh pour offir un plateau</p>
									<p class="price">4<sup></sup></p>
								</li>
								<li>
									<h3>Biryani <span class="vegan"></span> <span class="coeur"></span></h3>
									<p>Riz sauté aux épices, pois verts &amp; zucchini, herbes hachées et raïta</p>
									<p><span class="pilon"></span> Ajout de 2 pilons 3<sup>50</sup></p>
									<p class="price">6<sup></sup></p>
								</li>
								<li>
									<h3>Riz au curcuma <span class="vegan"></span></h3>
									<p class="price">2<sup></sup></p>
								</li>
							</ul>
						</div>
					</li>
					<li class="a-4">
						<a href="/" class="menuaccord">Curries</a>
						<div class="afteraccord">
							<ul class="list-unstyled">
								<li>
									<h3>Poulet au beurre <span class="coeur"></span></h3>
									<p>Poulet biologique des Voltigeurs, refroidi à l'air, élevé en liberté viande marinée et grillée, riche sauce tomatée, aromes de cardamome et coriandre </p>
									<p class="price">13<sup>50</sup></p>
								</li>
								<li>
									<h3>Crevettes nordiques &amp; morue</h3>
									<p>Crevettes du Québec, morue du Canada pochée, légumes variés, sauce coco au galanga, gingembre &amp; citronnelle, lime kéfir, garniture de fèves germées croquantes. </p>
									<p class="note"><span class="tofu"></span>Remplacer le poisson &amp; crevettes par du Tofu mariné 11<sup>25</sup> <span class="vegan"></span></p>
									<p class="price">15<sup></sup></p>
								</li>
								<li>
									<h3>Légumes Korma <span class="vegan"></span></h3>
									<p>Légumes variés, lentilles, noix torréfiées, sauce coco aux arômes de macis, cardamome &amp; cumin, menthe fraiche </p>
									<p class="price">11<sup></sup></p>
								</li>
								<li>
									<h3>Pois chiches au tamarin <span class="vegan"></span></h3>
									<p>Légumes variés, sauce relevée avec arômes de paprika, curcuma &amp; coriandre, coulis de mangue et gingembre</p>
									<p class="price">10<sup></sup></p>
								</li>
								<li>
									<h3>Pilon de poulet</h3>
									<p>Poulet biologique des Voltigeurs, refroidi à l'air, élevé en liberté marinade au Garam Masala, 5 pilons grillés enrobés d'une sauce au paprika relevée, yogourt coriandre &amp; menthe.</p>
									<p class="price">12<sup></sup></p>
								</li>
							</ul>
						</div>
					</li>
					<li class="a-5">
						<a href="/" class="menuaccord">Breuvages</a>
						<div class="afteraccord">
							<ul class="list-unstyled">
								<li>
									<h3>Limonade concombre et menthe</h3>
									<p class="price">3<sup></sup></p>
								</li>
								<li>
									<h3>Limonade à l'eau de rose et pétales</h3>
									<p class="price">3<sup></sup></p>
								</li>
								<li>
									<h3>Chaï glacé</h3>
									<p>Chaï infusé avec notre mélange d'épices <br>maison avec une touche de sucre</p>
									<p class="note"><span class="milk"></span>Ajoutez du lait pour  0<sup>55</sup></p>
									<p class="price">3<sup></sup></p>
								</li>
								<li>
									<h3>Thé chaud (feuilles lousses)</h3>
									<p>Vert au jasmin - earl grey - noir - chaï masala</p>
									<p class="price">2<sup>85</sup></p>
								</li>
								<li>
									<h3>Tisane (feuilles/fleurs lousses)</h3>
									<p>Lavande - camomille - menthe - rose</p>
									<p class="price">2<sup>85</sup></p>
								</li>
								<li>
									<h3>Café filtre</h3>
									<p>Phil &amp; Seb, bio - équitable - 3<sup>ième</sup> vague</p>
									<p class="price">3<sup></sup></p>
								</li>
							</ul>
						</div>
					</li>
					<li class="a-6">
						<a href="/" class="menuaccord">Desserts</a>
						<div class="afteraccord">
							<ul class="list-unstyled">
								<li>
									<h3>Malabi</h3>
									<p>Pouding au lait de coco, garniture de fruits</p>
									<p class="price">4<sup></sup></p>
								</li>
								<li>
									<h3>Dessert du jour</h3>
									<p>Dessert fait maison par le pâtissier du Café Frida</p>
									<p class="price">5<sup>50</sup></p>
								</li>
							</ul>
						</div>
					</li>
				</ul>
</div>
</div>

  


<section class="video-sec" >
<div class="wpb_row vc_row-fluid full-row">
<div class="spattern">

<video autoplay="" loop="" muted="" preload="auto" class="video-item">
<source src="assets/videos/risotto-video01.mp4" type="video/mp4">
Your browser does not support the video tag. I suggest you upgrade your browser.</video>


<article class="slides-content">
<div class="container">
<div class="vc-coloumn">
<div class="vc_column-inner ">
<div class="wpb_wrapper"><hr class="vertical-space4">
<div class="divider">
<i class="fa fa-star" aria-hidden="true"></i>

<h3><span class="reservationtitle">Reservation</span>
<span class="subtitle">BOOK A TABLE</span></h3></div>
<hr class="vertical-space">
	
	<form action="http://www.opentable.com/restaurant-search.aspx" method="get" class="reservation-form" target="_blank">
		<div class="res-sub-form">

			<div class="reservation-col">
				<i class="fa fa-calendar" aria-hidden="true"></i>

				<span class="form-wrap">
					<input name="startDate" class="reservation-date" value="" autocomplete="off" type="text">
				</span>
			</div>

			<div class="reservation-col">
				<i class="fa fa-clock-o" aria-hidden="true"></i
				<span class="form-wrap">
					<select name="ResTime" class="otw-selectpicker"><option value="5:00pm">5:00 pm</option>
<option value="5:30pm">5:30 pm</option>
<option value="6:00pm">6:00 pm</option>
<option value="6:30pm">6:30 pm</option>
<option value="7:00pm" selected="selected">7:00 pm</option>
<option value="7:30pm">7:30 pm</option>
<option value="8:00pm">8:00 pm</option>
<option value="8:30pm">8:30 pm</option>
<option value="9:00pm">9:00 pm</option>
<option value="9:30pm">9:30 pm</option>
<option value="10:00pm">10:00 pm</option>
<option value="10:30pm">10:30 pm</option>
<option value="11:00pm">11:00 pm</option>
<option value="11:30pm">11:30 pm</option>

					</select>
				</span>
			</div>

			<div class="reservation-col">
				<i class="fa fa-user" aria-hidden="true"></i>

				<span class="form-wrap">
					<select name="partySize" class="otw-party-size-select">
						<option value="1">1 Person</option>
						<option value="2">2 People</option>
						<option value="3">3 People</option>
						<option value="4">4 People</option>
						<option value="5">5 People</option>
						<option value="6">6 People</option>
						<option value="7">7 People</option>
						<option value="8">8 People</option>
						<option value="9">9 People</option>
						<option value="10">10 People</option>
					</select>
				</span>
			</div>

			<div class="reservation-col">
				<input value="FIND A TABLE" type="submit">
			</div>

			<input name="RestaurantID" class="RestaurantID" value="53425" type="hidden">
			<input name="rid" class="rid" value="53425" type="hidden">
			<input name="GeoID" class="GeoID" value="15" type="hidden">
			<input name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy" type="hidden">
			<input name="RestaurantReferralID" class="RestaurantReferralID" value="53425" type="hidden">

			<p>Openning hour is <strong>7:00 am - 11:00 pm</strong> every day on week</p>
		</div>

	</form><hr class="vertical-space5"></div></div></div></div></article></div></div></section>



<div class="footer">
<div class="footercontent">
    <div class="col">
      <h4>Company</h4>
	  <a href="#">How it works</a></br>
	  <a href="#">Service Area</a></br>
	  <a href="#">Team</a></br>
	  <a href="faq/faq.html">FAQs</a></br>
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
	  <button class="Footerbutton1" onclick="parent.open('https://www.facebook.com/')"><i class="fa fa-facebook-square" aria-hidden="true"></i></button>
	  <button class="Footerbutton2" onclick="parent.open('https://www.youtube.com/')"><i class="fa fa-youtube" aria-hidden="true"></i></button>
	  <button class="Footerbutton3" onclick="parent.open('https://www.twitter.com/')"><i class="fa fa-twitter-square" aria-hidden="true"></i></button>
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

<?php 
session_start();	
require_once '../includes/class.user.php';
$user = new USER();

if(isset($_POST["place"]))
{$_SESSION["place"]=$_POST["place"];
}

 if(isset($_SESSION["place"]))
   {	$place = $_SESSION['place'];
   }
   else
   { $place="Location unknown";
   }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="restaurant.css">
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
  <li><a id="link5" class="mainlink">Sign In</a></li>
</ul>
</nav>
</div>


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
	<input name="btn-signup" value="Sign up" class="sign-up-btn" type="button"> 
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
<h2 class="headline"><span class="first-letter">R</span>estaurants</h2>
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
 
 </div> </div>
 
 
 </div> 
</section>



<div class="section">


<?php
                            $stmt = $user -> runQuery("select * from restaurants WHERE location = :location");
							$stmt->execute(array(":location"=>"Powai"));
							
							while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
                            
                                
                                ?>
								
								

			<div class="search-snippet-card">
	    <div class="content">
        	<div class="js-search-result">
       		     <article class="search-result">

                	<div class="pos-relative">
                    <div class="row">
                                  <div class="col-smj-6">
                                <div class="search-left-featured">
                                   <a href="" class="feat-img" ></a>
                               </div>
                        	</div>
                            
                        <div class="p10">
                            <div class="row">
                                <div class="col-s-12">
                              <div class="res-snippet-small" style="margin-bottom: 7px;">
							   <a title="Casual Dining in Powai" href="# " class="zdark"><?php echo $row["type"];?>
							  </a></div>
                                                                                                            

                                    <a class="result-title" href="#" title="gurukripa Restaurant, Powai"><?php echo $row["name"];?>
                                    </a>
                                    <div class="clear"></div>
                                                                        
                                        <a class="search-page-text" href="#" title="Restaurants in Powai"><b><?php echo $row["location"];?></b></a>
                                    
                                                                                                        </div>
                                <div class="search-result-rating" style="line-height: 14px;">
                                  <div class="rating-popup">
                                        <?php echo $row["rating"];?>
                                    </div>
                                    <div class="clearmb5"></div>

                                    <!-- show the vote count only if there's a rating -->
                                                       <span class="rating-votes-div">761 votes</span>
                                                                                                            
                                                                        
                                                                            <br>
                                        <a href="#" class="result-reviews" title="User reviews for Gurukripa, Powai" >
                                            459 reviews
                                        </a>
                                                                    </div>
                            </div>

                            <div class="row">
                                                                    
                                          <div style=" max-width:370px; " class="search-result-address" title="55, Thunga Village, Opposite Local Office Bus Stop, Saki Vihar Road, Powai, Mumbai"> <?php echo $row["address"];?></div>
                                                                        
                                                                        
                                                                                              </div>
                        </div>
                    </div>
                </div>

                
                                            <div class="ui-divider"></div>
                    
                    <div class="search-page-clearfix">
                                                    <div class="clearfix">
													<span class="ttuper-grey-text">Cuisines: </span>
													<span class="nowrap-p10">
													<a class="cuisine-title" title="North Indian" href="#">North Indian</a>, 
													<a class="cuisine-title" title="Chinese" href="#">Chinese</a>,
													<a class="cuisine-title" title="Seafood" href="#">Seafood</a>
													</span></div>
                        
                                                    <div class="res-cost-clearfix">
<span class="ttuper-grey-text">Cost for two:</span>
<span class="col-s-p10"><?php echo $row["cost"];?></span></div>
                        
                                                     <div class="res-timing clearfix" title="11:30 AM to 12:30 AM">
                            <span class="ttuper-grey-text left">Hours:</span>
                            <div class="search-grid-right">
                                <?php echo $row["hours"];?>
                                                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        
                        
                                                  

                                                

                          
                        
                                                  

                    </div>

                    
                    
                    

                                         
                                </article>
        </div>
    </div>

        <div class="search-result-action">

                                <a class="item-res-snippet">
                <span class="zdark">Call</span>
            </a>
                    
                <a class="item-result-menu" href="../order/order.php?res_id=<?php echo $row["id"];?>" title="gurukripa Menu">
            <span class="zdark">View Menu</span>
        </a>
        
                                <a class="item-link" href="../order/order.php">
								<div><span class="fontsize4 bold zgreen o2_btn_text action_btn_icon">Order Now</span>
								<div class="clear ieclear"></div>
								<span class="fontsize5 grey-text">60 min · Rs. 200</span></div></a>
                    
        

                                    <a class="item-book-test" href="#" title="Book a table at gurukripa" style="text-transform:none;">
                                        <span class="zdark data-book">
                        Book a Table
                    </span>
                                    </a>
                    
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
	  <a href="#" style="text-decoration:none;">Believers</a></br>
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
<script src="restaurant.js"></script>


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

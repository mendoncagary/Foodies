<?php 
require_once '../includes/class.user.php';
$user = new USER();



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
 <input value="Checkout" onclick="document.location.href='../cart/cart.php'" class="check-out" type="button"> 
 <img src="images/cart-icon.e823b04a.svg" alt="" onclick="redirect_to_cart()" class="displaynone" style="margin-top:15px"> 
 <div class="price-outer"> 
 <div class="price"> <span>₹</span> 0 </div> </div> </div> </div> 
</section>





<div class="section">

<?php
                            $stmt = $user -> runQuery("select * from tb_products WHERE category = :category");
							$stmt->execute(array(":category"=>"Dinner"));
							
							while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
                            
                                
                                ?>
								
<div class="fooddiv">
   
    <div class="dish-img">
      
      <div class="dish-image-anchor">
        <a href="#"  class="modal-popup">
          <label class="dish-label"><span><?php echo $row["filter"];  ?></span></label>
          
          <span class="dish-addToCart"></span>
          
          <span class="dish-rating"><i class="fa fa-star icon-star" aria-hidden="true"></i><?php echo $row["rating"];?></span>
          
          <img alt="Dsc 7926" class="food-item-placeholder-image-url" src="https://d1e7veuf3koykl.cloudfront.net/food_items/images/000/020/707/medium2/DSC_7926.JPG?1471438427">
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
         
          <div class="dish-add-remove">
            <button class="rmv-btn"  name="button" type="submit">-</button>
            <span class="addet_item_cart"></span>
            <button class="add-btn"  name="button" type="submit">+&nbsp;&nbsp;Add</button>
          </div>
      </div>
      
      <div class="dish-chef">
          <div class="dish-chef-img">
            <a href="#">
            
                </a>
				<a href="/chefs/chef-ramani-m-v">
				<img alt="Ramani" class="lazy" src="https://d1e7veuf3koykl.cloudfront.net/cheffs/avatars/000/000/003/small2/Ramani.jpg?1426745740"></a>
            
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
<script src="order.js"></script>

</body>

</html>

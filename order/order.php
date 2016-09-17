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
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">




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
 <div class="locality-ellipsis ng-binding">1403, Phase One, MHADA Colony 20, ... </div>
 <div class="width20locality">
 <input value="Edit" class="edit-btn" ng-click="editLocality()" type="button"></div></span>
 <!-- <input type="button" value="Edit" class="edit-btn"> -->
 <span class="ng-hide" ng-show="showEditLocality"> 
 <div ng-class="isLocationNotProper? 'widthshowlocality' : ''"> 
 <div class="input2 ng-hide" ng-show="isLocationNotProper">
 <div class="location-not-proper-ellipsis ng-binding"> false</div> 
 <a href="" ng-click="toggleDiv()">
 <img src="images/cross-white.26cb9f25.png" alt=""></a> </div> </div> 
 <!-- Delivery Location e.g. Marine Drive, Mumbai --> 
 <div ng-class="isLocationNotProper? 'width-wherein-locality' : ''"> 
 <input autocomplete="off" id="googleAutoCompleteBox" class="input-locality-edit input-search-focus ng-pristine ng-untouched ng-valid ng-isolate-scope" placeholder="Delivery Location" ng-model="address_location" ng-autocomplete="" details="localityDetails" options="options" type="text">
 <img class="location_close" ng-click="toggleEditLocality()" src="images/cross-white.26cb9f25.png" alt=""> 
 </div> </span> </div> 
 <div class="filter-icon-white">
 <button type="button" class="dropdown-toggle" data-toggle="dropdown"> 
 <img ng-hide="filter_present" src="images/filter_empty.bcdd107b.svg" alt="" class="displayblock"> 
 <img ng-show="filter_present" src="images/filter_applied.b1f2cad7.svg" alt="" class="displayblock ng-hide"> 
 <img ng-hide="filter_present" src="images/filter_empty_mobile.b9124006.svg" alt="" class="displaynone filter-show"> 
 <img ng-show="filter_present" src="images/filter_applied_mobile.406ef5d0.svg" alt="" class="displaynone filter-show ng-hide">
 </button> 
 <ul class="dropdown-menu dropdown-menu2 filter-drop-down" id="dropdown-menu2"> 
 <!-- ngRepeat: tag in tags -->
 <li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)"> 
 <a class="ng-binding" href="" data-value="option0" tabindex="-1">Non-Veg<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li><!-- end ngRepeat: tag in tags -->
 <li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)">
 <a class="ng-binding" href="" data-value="option1" tabindex="-1">Veg<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li><!-- end ngRepeat: tag in tags -->
 <li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)"> 
 <a class="ng-binding" href="" data-value="option2" tabindex="-1">Supreme<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <!-- end ngRepeat: tag in tags --><li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)">
 <a class="ng-binding" href="" data-value="option3" tabindex="-1">Signature<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li><!-- end ngRepeat: tag in tags --><li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)">
 <a class="ng-binding" href="" data-value="option4" tabindex="-1">Classic<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <!-- end ngRepeat: tag in tags -->
 <li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)"> 
 <a class="ng-binding" href="" data-value="option5" tabindex="-1">Non-Spicy<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <!-- end ngRepeat: tag in tags -->
 <li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)"> 
 <a class="ng-binding" href="" data-value="option6" tabindex="-1">Best Sellers<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label>
 </a> </li><!-- end ngRepeat: tag in tags --><li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)"> 
 <a class="ng-binding" href="" data-value="option7" tabindex="-1">Spicy<input class="css-checkbox" type="checkbox"> 
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <!-- end ngRepeat: tag in tags --><li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)"> 
 <a class="ng-binding" href="" data-value="option8" tabindex="-1">Paneer Dishes<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li><!-- end ngRepeat: tag in tags -->
 <li class="ng-scope" ng-repeat="tag in tags" ng-click="add_filter(tag)"> 
 <a class="ng-binding" href="" data-value="option9" tabindex="-1">Protein Punch<input class="css-checkbox" type="checkbox">
 <label for="checkboxG96" class="css-label radGroup1"></label> </a> </li>
 <!-- end ngRepeat: tag in tags -->
 </ul> </div> </div>
 <div class="col-sm-6 pull-right ng-hide" ng-show=" cart.items.length > 0"> 
 <div class="circle ng-binding">0</div> 
 <input ng-click="redirect_to_cart()" value="Checkout" class="check-out radius-3 displayblock" type="button"> 
 <img src="images/cart-icon.e823b04a.svg" alt="" ng-click="redirect_to_cart()" class="displaynone" style="margin-top:15px"> 
 <div class="price-outer"> 
 <div class="price ng-binding"> <span>₹</span> 0 </div> </div> </div> </div> 
</section>





<div class="section">

<?php
                            $stmt = $user -> runQuery("select * from tb_products WHERE category = :category");
							$stmt->execute(array(":category"=>"Travelling"));
							
							while($row = $stmt->fetch(PDO::FETCH_ASSOC))
							{
                            
                                
                                ?>
								
<div class="fooddiv">
   
    <div class="dish-img">
      
      <div class="dish-image-anchor">
        <a href="#"  class="modal-popup">
          <label class="dish-label"><span>Saffola Fit Foodie Recipe</span></label>
          
          <span class="dish-addToCart"></span>
          
          <span class="dish-rating"><i class="fa fa-star icon-star" aria-hidden="true"></i>4.7</span>
          
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
              
                </a><a href="/chefs/chef-ramani-m-v"><img alt="Ramani" class="lazy" src="https://d1e7veuf3koykl.cloudfront.net/cheffs/avatars/000/000/003/small2/Ramani.jpg?1426745740"></a>
            
          </div>
          <div class="dish-chef-detail">
            <span class="chef-name"><a class="chefNameLink" href="/chefs/chef-ramani-m-v">Chef Ramani M V</a></span>
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

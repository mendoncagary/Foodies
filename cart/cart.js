

var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("page").style.display = "block";
}


 window.requestAnimationFrame = window.requestAnimationFrame
 || window.mozRequestAnimationFrame
 || window.webkitRequestAnimationFrame
 || window.msRequestAnimationFrame
 || function(f){setTimeout(f, 1000/60)}
 
 var bgimg1 = document.getElementsByClassName("bgimg1");
 
 
function parallaxeffect(){
 var scrolltop = window.pageYOffset ;// get number of pixels document has scrolled vertically 
 bgimg1[0].style.backgroundPositionY = -scrolltop * .05 + 'px';
}
 
window.addEventListener('scroll', function(){ // on page scroll
 requestAnimationFrame(parallaxeffect) // call parallaxbubbles() on next available screen paint
}, false)


//Slide Toggle Sign in cart panel
$(document).ready(function(){
$("#panel-1").show();
 $("#nextstepbutton").click(function(){
	  $("#panel-1").hide();
	  $("#panel-2").show();
	  $("#panel-title-cart").removeClass("panel-active");
	  $("#panel-title-signin").addClass("panel-active");
 });
 
  
 
	$("#sign-up-button").click(function(){
		$("#signupModal").removeClass("ng-hide");
		$("#myModal").addClass("ng-hide");
		
	});
	
	$("#sign-in-button").click(function(){
		$("#myModal").removeClass("ng-hide");
		$("#signupModal").addClass("ng-hide");
		
	});


$("#proceedbutton").click(function(){
	  $("#panel-3").show();
	  $("#panel-2").hide();
	  $("#panel-title-signin").removeClass("panel-active");
	  $("#panel-title-delivery").addClass("panel-active");
 });
 
 
 
$("#proceedpayment").click(function(){
	  $("#panel-4").show();
	  $("#panel-3").hide();
	  $("#panel-title-delivery").removeClass("panel-active");
	  $("#panel-title-makepayment").addClass("panel-active");
 });
 
 
 });
 
 
 

 
 //email/password label
 $(document).ready(function(){

 $("#password-input").keypress(function()
 {
	 
	   $("label[for='password-input']").css({"transform": "scale(.55,.55) rotateY(0)", "line-height": "45px", "font-size": "21px" });
	 if(!$("#password-input").val())
	 
	 {
		$("label[for='password-input']").css({"transform": "scale(1,1) rotateY(0)", "line-height": "45px", "font-size": "14px" });
	 }
 
});
	 
 
 $("#email-input").keypress(function()
 {
	  $("label[for='email-input']").css({"transform": "scale(.55,.55) rotateY(0)", "line-height": "45px", "font-size": "21px" });
	 
	 if(!$("#email-input").val())
	 {
		$("label[for='email-input']").css({"transform": "scale(1,1) rotateY(0)", "line-height": "45px", "font-size": "14px" });
	 }
 });
 
 
 
 $("#add-address").click(function()
 {
	 $("#panel-3 .delivery-pad").eq(0).addClass("ng-hide");
	 $("#panel-3 .delivery-pad").eq(1).removeClass("ng-hide");
 });
 
	});
 
 
 //validate email/password
 function validate(input,field,query)
{
	
	var xmlhttp;
	
if (window.XMLHttpRequest)
  {// for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }	
  
    xmlhttp.onreadystatechange = function()
    {
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {	
			
			document.getElementById(field).innerHTML = xmlhttp.responseText;
        }
        
	}
    xmlhttp.open("GET", "../includes/validation.php?input="+input+"&field="+field+"&query="+query, true);
    xmlhttp.send();
}





function ordersuccess(){
	
   var action = "checkout";
   
   $.ajax({
        type:'post',
        url:'../includes/checkout.php',
        data:{
		  action:action,
        },
        success:function(response) {
			
			alert("Your order has been placed.");
			
			
}

   });
   
}
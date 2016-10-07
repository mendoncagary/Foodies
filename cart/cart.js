

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

 $(".next-step").click(function(){
	  $("#panel-1").hide();
	  $("#panel-2").show();
	  $("#panel-title-cart").removeClass("panel-active");
	  $("#panel-title-signin").addClass("panel-active");
	  
 
 
 });
 });
 
 
 

 
 //email/password label
 $(document).ready(function(){

 $(".modalinput").focus(function()
 {
	 if($(".modalinput").val())
	 { $(".panel-signin .floating-placeholder label").css({"transform": "scale(.55,.55) rotateY(0)", "line-height": "45px", "font-size": "21px" });
	 }
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

$(document).ready(function() {
	$("#sign-up-button").click(function(){
		$("#signupModal").show();
		$("#myModal").hide();
		
	});
	
	$("#sign-in-button").click(function(){
		$("#myModal").show();
		$("#signupModal").hide();
		
	});

});


 
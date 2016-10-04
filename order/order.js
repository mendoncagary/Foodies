

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

 
 $(document).ready(function(){
var x=0;
 
 $(".add-btn").click(function(){
    $(".add-btn").addClass("added-btn");
	$(".rmv-btn").show();
	$(".added_item_cart").show();

	x=x+1;
   
    $(".added_item_cart").html(x);
	$(".circle").html(x);
	$(".dish-addToCart").addClass("dish-addToCart1");
	$(".dish-addToCart1").html(x);
	$(".pull-right").removeClass("hideCheckOut");
	});





 $(".rmv-btn").click(function(){
	if(x>1)
	{
	x=x-1;
      $(".added_item_cart").html(x);
	$(".dish-addToCart1").html(x); 	
	}
	else if(x=1)
	{
	x=x-1;
	$(".added_item_cart").hide();
	$(".rmv-btn").hide();
		$(".dish-addToCart").removeClass("dish-addToCart1");
	

	$(".add-btn").removeClass("added-btn");
	
	}	
	else
	{
		x=x;
	}
	 
});	 	 
	 
});	 
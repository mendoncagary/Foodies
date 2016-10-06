

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
	  var id = $(this).attr("data-item-id");
	  
    $(".add-btn[data-item-id="+id+"]").addClass("added-btn");
	$(".rmv-btn[data-item-id="+id+"]").show();
	$(".fooddiv[data-item-id="+id+"] .added_item_cart").show();

	$(".fooddiv[data-item-id="+id+"] .dish-addToCart").addClass("dish-addToCart1");
	$(".fooddiv[data-item-id="+id+"] .dish-addToCart1").each(function() {
   $(this).data("serial");
   
   $(".fooddiv[data-item-id="+id+"] .added_item_cart").html(parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(), 10)+1);
   $(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(parseInt($(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(), 10)+1);
   $(".circle").html(parseInt($(".circle").html(), 10)+1);
});

	$(".pull-right").removeClass("hideCheckOut");
	});





 $(".rmv-btn").click(function(){
	 var id = $(this).attr("data-item-id");
	if(parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(),10)>1)
	{
	
   $(".fooddiv[data-item-id="+id+"] .added_item_cart").html(parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(), 10)-1);
$(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(parseInt($(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(), 10)-1);
$(".circle").html(parseInt($(".circle").html(), 10)- 1);
	}
	else if(parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(),10) == 1)
	{
		$(".fooddiv[data-item-id="+id+"] .added_item_cart").html(parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(), 10)-1);
$(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(parseInt($(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(), 10)-1);
	$(".circle").html(parseInt($(".circle").html(), 10)- 1);
	$(".fooddiv[data-item-id="+id+"] .added_item_cart").hide();
	$(".rmv-btn[data-item-id="+id+"]").hide();
		$(".fooddiv[data-item-id="+id+"] .dish-addToCart").removeClass("dish-addToCart1");
	

	$(".add-btn[data-item-id="+id+"]").removeClass("added-btn");
	
	}	
	
});



	 	 
	 
});	 



$( document ).ready( function() {
 $( ".add-btn" ).on( "click", function() {
  var id = $(this).attr("data-item-id");
  $.ajax( {
   type: "GET",
   url: "../includes/ajax.php?id=" + id + "&action=add"
  })
  .done(function()
  {
   alert("Product have been added.");
  });
 });
});
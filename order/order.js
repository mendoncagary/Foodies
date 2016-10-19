

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
/*
 
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
   /*$(".circle").html(parseInt($(".circle").html(), 10)+1);*/


	/*$(".pull-right").removeClass("hideCheckOut");
	});
	
*/



/*
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

*/

	 	 
	 
});	 
/*
$(document).ready(function(){

      $.ajax({
        type:'post',
        url:'../cart/cart.php',
        data:{
          total_cart_items:"totalitems"
        },
        success:function(response) {
          /*document.getElementById("total_items").value=response;
		  $("#total_items").html(parseInt($("#total_items").html(), 10)+1);
        }
      });

    });
  */  

  
  
$( document ).ready( function() {
 $( ".add-btn" ).on( "click", function() {
  var id = $(this).attr("data-item-id");
   var name = $(this).attr("data-item-name");
   var price = $(this).attr("data-item-price");
   var action = "add";
   var quantity = parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(),10)+1;
   
   $.ajax({
        type:'post',
        url:'../includes/cartAction2.php',
        data:{
		  action:action,
          id:id,
          name:name,
          price:price,
		  quantity:quantity
        },
        success:function(response) {
			if(response)
			{$(".fooddiv[data-item-id="+id+"] .added_item_cart").html(response);
		       $(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(response);
		
		}
	$(".add-btn[data-item-id="+id+"]").addClass("added-btn");
	        $(".rmv-btn[data-item-id="+id+"]").removeClass("ng-hide");
	        $(".fooddiv[data-item-id="+id+"] .added_item_cart").removeClass("ng-hide");

	        $(".fooddiv[data-item-id="+id+"] .dish-addToCart").addClass("dish-addToCart1");
			$(".pull-right").removeClass("hideCheckOut");
	
	;
				/*$(".fooddiv[data-item-id="+id+"] .dish-addToCart1").each(function() {
                   $(this).data("serial");
   
                $(".fooddiv[data-item-id="+id+"] .added_item_cart").html(parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(), 10)+1);
                $(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(parseInt($(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(), 10)+1);
 });*/
          /*document.getElementById("total_items").value=response;*/
		  //$("#total_items").html(parseInt($("#total_items").html(), 10)+1);
        }
      });
	
   
   });
   
   
   
    $(".rmv-btn").click(function(){
	 var id = $(this).attr("data-item-id");
	 var name = $(this).attr("data-item-name");
     var price = $(this).attr("data-item-price");
     var action = "minus";
     var quantity = parseInt($(".fooddiv[data-item-id="+id+"] .added_item_cart").html(),10)-1;
   
	
	  $.ajax({
        type:'post',
        url:'../includes/cartAction2.php',
        data:{
		  action:action,
          id:id,
          name:name,
          price:price,
		  quantity:quantity
        },
        success:function(response) {
			if(response)
			{$(".fooddiv[data-item-id="+id+"] .added_item_cart").html(response);
		       $(".fooddiv[data-item-id="+id+"] .dish-addToCart1").html(response);
		}

	
	}	
	
});

});


});
	
	
	
$(document).ready(function(){
$('.icon-link').click(function(){
  $("#box-signin").slideToggle(); //<----here
   
});
});
	
	
	
	 
function checkForm()
{
//fetching values from all input fields and storing them in variables
    var txtupassvalue = document.getElementById("password-input").value;
    var txtemailvalue = document.getElementById("email-input").value;
    var action = "login";
	  $.ajax({
        type:'post',
        url:'includes/letmein.php',
       
		data:{
			action:action,
          txtupassvalue:txtupassvalue,
		  txtemailvalue:txtemailvalue
        },
		
        success:function(response1,response2) { 
			if(response1)
			{
			$("#email-error").show();	
			
			}
			
	       if(response2)
			{
			$("#password-error").show();
				
			}
			
		
				$.ajax({
                type:'post',
                url:'includes/letmein2.php',
       
		        data:{
		      	action:action,
                txtupassvalue:txtupassvalue,
		        txtemailvalue:txtemailvalue
        },
		success:function(response) { 
      
	  if(response)
	  {
		  
		  $("#usernamelist").append(response);	
        $("#myModal").hide();
				$("#link5").addClass("ng-hide");
				$("#linkw").removeClass("ng-hide");
				$("#link6").removeClass("ng-hide");	
				$("#box-signin").removeClass("ng-hide");	
    
				
	  }
	  else
	  {
		  $("#email-error").show();
		  $("#password-error").show();
	  }
   }
				});
			
}

	  });
	  
}

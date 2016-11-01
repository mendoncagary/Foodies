

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
        url:'../includes/letmein.php',
       
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
                url:'../includes/letmein2.php',
       
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




$( document ).ready( function() {
 $( ".contact-submit" ).on( "click", function() {
	 $(".ajax-loader").css({"visibility":"visible"});	
var name = $("span.your-name input").val();
var email = $("span.email input").val();
var message = $("span.your-message textarea").val();	 
   var action = "send_message";
   $.ajax({
        type:'post',
        url:'contact.php',
        data:{
          action:action,
		  name:name,
		  email:email,
		  message:message
        },
        success:function(response) {
		$(".ajax-loader").css({"visibility":"hidden"});		
	$(".response-output").html(response);	
	$(".contact-form")[0].reset();	
   }
   });
	
   
  });
});


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

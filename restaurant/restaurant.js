

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
 
 

 
 
 //Sign in modal
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



//AJAX Code to check  input field values when onblur event triggerd.
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

 
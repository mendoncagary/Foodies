



 //Header Scroll
 
 
 $(document).ready(function() {
        var headerTop = $('#header').offset().top;
        var headerBottom = headerTop + 600; // Sub-header should appear after this distance from top.
        $(window).scroll(function () {
            var scrollTop = $(window).scrollTop(); // Current vertical scroll position from the top
            if (scrollTop > headerBottom) { // Check to see if we have scrolled more than headerBottom
                if (($("#header").is(":visible") === false)) {
                    $("#header").addClass("bounce");
					$('#header').fadeIn('slow');
					
                }
            } else {
                if ($("#header").is(":visible")) {
                    $('#header').hide();
                }
            }
        });
    
	$("#scrolldown").click(function() {
    $('html,body').animate({
        scrollTop: $("#section1").offset().top},
        'slow');
});




	});
	
$(document).ready(function() {
    $(".input-search").keyup(function() {
        if ($(".input-search").val().length > 0 && $(".input-search").val()) {
            
                $(".padding-order-now").show();
				$('.padding-locate-me').hide();
            
			
                
            
		
        }
		else{
			
			$(".padding-locate-me").show();			 
			 $('.padding-order-now').hide();
            
			
             
            
			
			
		}
    });
});


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


//Search Location loader function
$(document).ready(function(){
$('.locate-me').click(function(){
  $(".input-bar").css("width","70%");
  $('.float-spinner').show(); //<----here
   
});



});

//Preloader


$(document).ready(function(){
$('.icon-link').click(function(){
  $("#box-signin").slideToggle(); //<----here
   
});
});
	
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("page").style.display = "block";
}





//Parallax Effect


window.requestAnimationFrame = window.requestAnimationFrame
 || window.mozRequestAnimationFrame
 || window.webkitRequestAnimationFrame
 || window.msRequestAnimationFrame
 || function(f){setTimeout(f, 1000/60)}
 
 var bgimg1 = document.getElementsByClassName("bgimg1");
 var bgimg2 = document.getElementsByClassName("bgimg2");
 var bgimg3 = document.getElementsByClassName("bgimg3");
var bgimg4 = document.getElementsByClassName("bgimg4"); 
 
function parallaxeffect(){
 var scrolltop = window.pageYOffset ;// get number of pixels document has scrolled vertically 
 bgimg1[0].style.backgroundPositionY = -scrolltop * .07 + 'px';
 bgimg3[0].style.backgroundPositionY = -scrolltop * .07+ 'px'; // move bubble1 at 20% of scroll rate
 bgimg2[0].style.backgroundPositionY = -scrolltop * .07 + 'px'; // move bubble2 at 50% of scroll rate
 bgimg4[0].style.backgroundPositionY = -scrolltop * .07 + 'px'; // move bubble2 at 50% of scroll rate
}
 
window.addEventListener('scroll', function(){ // on page scroll
 requestAnimationFrame(parallaxeffect) // call parallaxbubbles() on next available screen paint
}, false);
 


 
 
 
//Google Places Autocomplete API 
function initialize() {


	var options = {
					
					
				};
				
	var x = document.getElementById('googleAutoCompleteBox');
	var autocomplete = new google.maps.places.Autocomplete(x);

	}

/*code for validating place		
 function validateplace() {
    searchfield = $('#googleAutoCompleteBox').val();
    var place = autocomplete.getPlace();
    if (searchfield == "" || searchfield == null) { 
        // No text entered
        alert('Please enter text');
        return false;
    } else if (place== searchfield) { 
        // Succ
        // return true to submit the form
        
        alert('WADDUP!! Form submitted successfully bru!');
        place = null;
        placesearch = "";
        $('#searchfield').val('');
        return false; 
    } else { 
        // place info and search text do not match, perform manual lookup   
        // when lookup is complete, the callback function will store the place info
        // and resubmit the form
        var request = {
            query: searchfield
        };
        service.textSearch(request, textsearchcallback);
        return false;
    }
}

*/
 
 //Geolocation
 var x = document.getElementById("googleAutoCompleteBox");


 
  var geoOptions = {
     timeout: 10 * 1000
  };
  
  
function getLocation() {
	
	
   	$(".float-spinner").toggle();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition,showError,geoOptions);
    } else { 
        x.value = "Geolocation is not supported by this browser.";}
    }
    
	
	
function showPosition(position) {
	
      	var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var accuracy = position.coords.accuracy;
 
   // x.innerHTML="Latitude: " + latitude + 
   // "<br>Longitude: " + longitude;
	
	
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        //alert("Location: " + results[1].formatted_address);
						x.value = results[1].formatted_address;
						
						

                       	$('.float-spinner').hide(); //<----here
	
					$(".input-bar").css("width","81%");
					
					var orderNow = document.getElementsByClassName("padding-order-now");
					var order = orderNow[0];
					
					order.style.display="block";
					
					var locateMe = document.getElementsByClassName("padding-locate-me");
					var locate = locateMe[0];
	

					locate.style.display = "none";
							
                    }
                }
            });
         
       
}


function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.value = "User denied the request for Geolocation.";
            break;
        case error.POSITION_UNAVAILABLE:
            x.value = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            x.value = "The request to get user location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            x.value = "An unknown error occurred.";
            break;
    }
}
 
 
 
 

 
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

    


$(document).ready(function(){
	
	
$("#signmebutton").click(function(){
//fetching values from all input fields and storing them in variables
    var name = document.getElementById("sign-up-name").value;
    var password = document.getElementById("sign-up-password").value;
	var email = document.getElementById("sign-up-email").value;
    var action = "signup";
	  $.ajax({
        type:'post',
        url:'includes/signup.php',
       
		data:{
			action:action,
          name:name,
		  password:password,
		  email:email
        },
		
        success:function(response) {
			
			$("#myModal").hide();
   }
   });



});
});
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
    xmlhttp.open("GET", "includes/validation.php?input="+input+"&field="+field+"&query="+query, true);
    xmlhttp.send();
}

 
 function validateplace(){
	 var xmlhttp;
	
if (window.XMLHttpRequest)
  {// for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }	
  
    var url = "restaurant/restaurant.php";
    var place = document.getElementById("googleAutoCompleteBox").value;
    var vars = "place="+place;
	
	xmlhttp.onreadystatechange = function()
    {
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {	
			
	     window.location.href = "restaurant/restaurant.php";		
        }
        
	}
	
	xmlhttp.open("POST", url, false);
	
	
	 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
    xmlhttp.send(vars);
			
	
      
        

	 
	 
 }
 
 
 
 /*
 $(".order-now").click(function(){
	  var place = $("#googleAutoCompleteBox").val();
    $.post("restaurant/restaurant.php",
    {
       place:place
    },
    function(){
        window.location.href = "restaurant/restaurant.php";
    });
});

*/
 

 
//Logout script

    

$( document ).ready( function() {
 $( ".current_logout" ).on( "click", function() {
   
   $.ajax({
        type:'post',
        url:'home.php',
        data:{
          logout:logout
        },
        success:function(response) {
			
	
   }
   });
	
   
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
 
 

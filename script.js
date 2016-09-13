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



//Preloader
	
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
 
 
function parallaxeffect(){
 var scrolltop = window.pageYOffset ;// get number of pixels document has scrolled vertically 
 bgimg1[0].style.backgroundPositionY = -scrolltop * .05 + 'px';
 bgimg3[0].style.backgroundPositionY = -scrolltop * .05+ 'px'; // move bubble1 at 20% of scroll rate
 bgimg2[0].style.backgroundPositionY = -scrolltop * .05 + 'px'; // move bubble2 at 50% of scroll rate
}
 
window.addEventListener('scroll', function(){ // on page scroll
 requestAnimationFrame(parallaxeffect) // call parallaxbubbles() on next available screen paint
}, false)
 


 
 
 
//Google Places Autocomplete API 
function initialize() {


	var options = {
					
					
				};
				
	var x = document.getElementById('googleAutoCompleteBox');
	var autocomplete = new google.maps.places.Autocomplete(x);

	}

google.maps.event.addDomListener(window, 'load', initialize);	 
 

 
 
 
 //Geolocation
 var x = document.getElementById("googleAutoCompleteBox");


 
  var geoOptions = {
     timeout: 10 * 1000
  }
  
  
function getLocation() {
	
	
   	$(".float-spinner").toggle();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition,showError,geoOptions);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";}
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
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
 
 

	 
      

 
 

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
 

 
 
 
 
 //Geolocation
 var x = document.getElementById("demo");

 
	 
 


 
  var geoOptions = {
     timeout: 10 * 1000
  }
  
  
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition,showError,geoOptions);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";}
    }
    
	
	
function showPosition(position) {
	
      	var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var accuracy = position.coords.accuracy;
 
    x.innerHTML="Latitude: " + latitude + 
    "<br>Longitude: " + longitude;
	
	
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        alert("Location: " + results[1].formatted_address);
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
 
 

	 
      

 
 

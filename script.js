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
 
 
 

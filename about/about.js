

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


// sign in modal
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
 
 

var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("page").style.display = "block";
}

/*
Image img=new Image();
var onScrollHandler = function() {
  var newImageUrl = yourImageElement.src;
  var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  if (scrollTop > 100) {
     newImageUrl = "img1.jpg"
  }
  if (scrollTop > 200) {
     newImageUrl = "img2.jpg"
  }
  if (scrollTop > 300) {
     newImageUrl = "img3.jpg"
  }
  yourImageElement.src = newImageUrl;
};
object.addEventListener ("scroll", onScrollHandler);
*/
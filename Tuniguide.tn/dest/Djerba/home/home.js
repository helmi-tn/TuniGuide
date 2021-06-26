
let stoppics=true;
src="https://kit.fontawesome.com/a076d05399.js"
var slideIndex = 0;
showSlides();
showSlides();
showSlides();
showSlides();

function showSlides() {
  if(stoppics){
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 4000); // Change image every 4 seconds
}
}

type="text/javascript">window.addEventListener("scroll",function(){                                 var header = document.querySelector("header");
  header.classList.toggle("sticky",window.scrollY > 110);                                                        })

function showMap(){
    var googlemap = document.querySelector(".googlemaps")
    var pics = document.querySelector(".hidit")
  if(stoppics){
    stoppics=false;
    googlemap.style.display="block";
    pics.style.display="none";
    }else{
      googlemap.style.display="none";
      pics.style.display="block";
      stoppics=true;
    }
  
}




let stoppics=true;
src="https://kit.fontawesome.com/a076d05399.js"
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

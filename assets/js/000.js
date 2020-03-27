//          Smoth scroll
$(document).ready(function(){
    $("a").on('click', function(event)
     {
      if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          window.location.hash = hash;
        });
      } 
    });
  });
  
  //            loading page
  var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();
  //            nav bar transmition
/*
  function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50)
    {
        document.getElementById("navbar-color").style.backgroundColor = "#1e1e1e";
    } 
    else
    {
      document.getElementById("navbar-color").style.backgroundColor = "transparent";
    }
  }
  window.onscroll = function() {scrollFunction()};
*/
///------------------- slider show

var cpt = 0,
tabimg=["assets//imgs/Slideshow/Wall-1.jpg","assets/imgs/Slideshow/Wall-2.jpg","assets/imgs/Slideshow/Wall-3.jpg","assets/imgs/Slideshow/Wall-4.jpg"];
function slider()
{
  if(cpt < tabimg.length)
  {
    document.getElementById("slideshow").style.backgroundImage="url('"+tabimg[cpt]+"')";
    this.cpt ++;
  }
  else
  {
    this.cpt=0;
    document.getElementById("slideshow").style.backgroundImage="url('"+tabimg[cpt]+"')";
  }
}
setInterval(()=>{ slider() },5000);

    
// slow Compteur des nombres
function animateValue(id, start, end, duration)
{
    var range = end - start;
    var current = start;
    var increment = end > start? 1 : +1;
    var stepTime = Math.abs(Math.floor(duration / range));
    var obj = document.getElementById(id);
    var timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}
// calender
$( "#date-forme").on( "click", function( event ) {

  $( "#date-forme" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });

});
/*----------------Search bar Script---------------- */

const search = document.getElementById("search");
const search2 = document.getElementById("search2");
const close = document.getElementById('close');
const forme1 = document.getElementById('form1');

function getsearch(key)
{
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function()
  {
   if (this.readyState==4 && this.status==200)
   {
      document.getElementById("list").innerHTML= this.responseText ;
   }
  }
  xhttp.open("GET","../php/moduls/fly.php?key="+key,true);
  xhttp.send();
}


const listItems = document.querySelectorAll('#list li');

listItems.forEach(function(item)
{
    item.onclick = function(e)
    {
            console.log(this.innerText); 
            forme1.value = this.innerText;
    }
});


forme1.onclick = function ()
{
  search.style.display = "block";
}


close.onclick = function()
{
    search.style.display = "none";
}

/* ------- */


// offre display
/*
var slideIndex = 1 ;
showSlides(slideIndex);
function plusSlides(n) 
{
  showSlides(slideIndex += n);
}
function currentSlide(n)
{
  showSlides(slideIndex = n);
}
function showSlides(n) 
{
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1;}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  
}
setInterval(function(){ showSlides(slideIndex);slideIndex++;},3000);*/

/*         appelle des fonction */
  
   
    

    
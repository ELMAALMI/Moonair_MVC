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

///------------------- slider show

var cpt = 0,
tabimg=["imgs/Slideshow/Wall-1.jpg","imgs/Slideshow/Wall-2.jpg","imgs/Slideshow/Wall-3.jpg","imgs/Slideshow/Wall-4.jpg"];
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

// search display
const form1 = document.getElementById("city1");
const form2 = document.getElementById("city2");
const search = document.getElementById("livesearch");
const close = document.getElementById('close');
close.onclick = function()
{
    search.style.display = "none";
}
form1.onfocus = function()
{
    search.style.display = "block";
}




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
  
   
    

    
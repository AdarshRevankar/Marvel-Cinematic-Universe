
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1;}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000);
  return
}

function plusSlides(n) {
    slideIndex += n
    setTimeout(showSlides, 5000);

}

function currentSlide(n){
    slideIndex = n;
    setTimeout(showSlides, 5000);
}

var slideIndex = 0;
showSlides();
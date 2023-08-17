let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
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

let search = document.querySelector('.search-box');

document.querySelector('#search-icon').onclick = () => {
    search.classList.toggle('active');
    menu.classList.remove('active');
}

let menu = document.querySelector('.navbar');

document.querySelector('#menu-icon').onclick = () => {
    menu.classList.toggle('active');
    search.classList.remove('active');
}

//hide menu and search box on scroll

window.onscroll = () => {
    menu.classList.remove('active');
    search.classList.remove('active');
}

let header = document.querySelector('header');
window.addEventListener('scroll', () => {
  header.classList.toggle('shadow', window.scrollY > 0);
});

//fullscreen

let fullscreenButton = document.getElementById("fullscreen-button");
let slideshowContainer = document.getElementById("slideshow-container");
let isFullscreen = false; // Zmienna przechowująca informację o trybie pełnoekranowym

fullscreenButton.addEventListener("click", () => {
  if (!isFullscreen) {
    enterFullscreen();
  } else {
    exitFullscreen();
  }
});

function enterFullscreen() {
  if (slideshowContainer.requestFullscreen) {
    slideshowContainer.requestFullscreen();
  } else if (slideshowContainer.mozRequestFullScreen) {
    slideshowContainer.mozRequestFullScreen();
  } else if (slideshowContainer.webkitRequestFullscreen || slideshowContainer.webkitEnterFullscreen) {
    if (slideshowContainer.webkitRequestFullscreen) {
      slideshowContainer.webkitRequestFullscreen();
    } else if (slideshowContainer.webkitEnterFullscreen) {
      slideshowContainer.webkitEnterFullscreen();
    }
  } else if (slideshowContainer.msRequestFullscreen) {
    slideshowContainer.msRequestFullscreen();
  }
}

function exitFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen || document.webkitCancelFullScreen) {
    if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.webkitCancelFullScreen) {
      document.webkitCancelFullScreen();
    }
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}


document.addEventListener('fullscreenchange', () => {
  isFullscreen = !!document.fullscreenElement; // Aktualizacja wartości zmiennej isFullscreen

  if (isFullscreen) {
    // Dodaj klasy CSS do elementów w trybie pełnoekranowym
    slideshowContainer.classList.add('fullscreen-slider');
    fullscreenButton.classList.add('fullscreen-icon-red');
    adjustImageSize(true); // Wywołaj funkcję dostosowującą rozmiar obrazu w trybie pełnoekranowym
  } else {
    // Usuń klasy CSS z elementów, gdy strona opuści tryb pełnoekranowy
    slideshowContainer.classList.remove('fullscreen-slider');
    fullscreenButton.classList.remove('fullscreen-icon-red');
    adjustImageSize(false); // Wywołaj funkcję dostosowującą rozmiar obrazu po opuszczeniu trybu pełnoekranowego
  }
});

function adjustImageSize(isFullscreen) {
  const images = slideshowContainer.getElementsByTagName('img');
  for (let i = 0; i < images.length; i++) {
    if (isFullscreen) {
      images[i].classList.add('fullscreen-image');
    } else {
      images[i].classList.remove('fullscreen-image');
    }
  }
}


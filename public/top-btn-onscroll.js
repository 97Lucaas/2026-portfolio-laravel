document.addEventListener("DOMContentLoaded", function() {
    fixedButton.style.top = "39px"; //bas

})

const fixedButton = document.getElementById("cv-btn");

// init pos
let lastScrollTop = 0;

function handleScroll() {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  // scroll on top or scoll to bottom ?
  if (scrollTop > lastScrollTop) {
    // bottom
    fixedButton.style.top = "-60px"; // haut
  } else {
    // top
    fixedButton.style.top = "39px"; // bas
  }
  
  // maj previous position
  lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
}

window.addEventListener("scroll", handleScroll);
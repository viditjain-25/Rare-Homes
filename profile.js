// DOM Elements
var vid = document.getElementById("hero-video");
var brand = document.getElementById("brand");
var subBrand = document.getElementById("sub-brand-text");
var heroDownButton = document.getElementById("hero-down-button");

// Show logo on video load
vid.oncanplay = function() {
    showSubBrand();
    setTimeout(showBrand, 1000);
    setTimeout(showDownButton, 2000);
};

function showBrand() {
  brand.classList.add("h1-appear");
}

function showSubBrand() {
  subBrand.classList.add("p-appear");
}

function showDownButton() {
  heroDownButton.classList.add("img-appear");
}

// Smooth scrolling
(function() {
  "use strict";
  // Feature Test
  if (
    "querySelector" in document &&
    "addEventListener" in window &&
    Array.prototype.forEach
  ) {
    // Function to animate the scroll
    var smoothScroll = function(anchor, duration) {
      // Calculate how far and how fast to scroll
      var startLocation = window.pageYOffset;
      var endLocation = anchor.offsetTop;
      var distance = endLocation - startLocation;
      var increments = distance / (duration / 16);
      var stopAnimation;

      // Scroll the page by an increment, and check if it's time to stop
      var animateScroll = function() {
        window.scrollBy(0, increments);
        stopAnimation();
      };

      // If scrolling down
      if (increments >= 0) {
        // Stop animation when you reach the anchor OR the bottom of the page
        stopAnimation = function() {
          var travelled = window.pageYOffset;
          if (
            travelled >= endLocation - increments ||
            window.innerHeight + travelled >= document.body.offsetHeight
          ) {
            clearInterval(runAnimation);
          }
        };
      } else {
        // If scrolling up
        // Stop animation when you reach the anchor OR the top of the page
        stopAnimation = function() {
          var travelled = window.pageYOffset;
          if (travelled <= (endLocation || 0)) {
            clearInterval(runAnimation);
          }
        };
      }

      // Loop the animation function
      var runAnimation = setInterval(animateScroll, 16);
    };

    // Define smooth scroll links
    var scrollToggle = document.querySelectorAll(".down-button");

    // For each smooth scroll link
    [].forEach.call(scrollToggle, function(toggle) {
      // When the smooth scroll link is clicked
      toggle.addEventListener(
        "click",
        function(e) {
          // Prevent the default link behavior
          e.preventDefault();

          // Get anchor link and calculate distance from the top
          var dataID = toggle.getAttribute("href");
          var dataTarget = document.querySelector(dataID);
          var dataSpeed = toggle.getAttribute("data-speed");

          // If the anchor exists
          if (dataTarget) {
            // Scroll to the anchor
            smoothScroll(dataTarget, dataSpeed || 500);
          }
        },
        false
      );
    });
  }
})();

// Start buggyfill for viewport units in old browsers
window.viewportUnitsBuggyfill.init();
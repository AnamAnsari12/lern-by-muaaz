const slider = document.querySelector(".flex-container");
let offset = 0;
const sliderWidth = slider.scrollWidth;
const containerWidth = slider.parentElement.offsetWidth;

function slide() {
  offset -= window.screen.width; // Adjust according to item width + gap

  if (Math.abs(offset) >= sliderWidth) {
    offset = 0;
  }

  slider.style.transform = `translateX(${offset}px)`;
  console.log("SLIDe");
}

setInterval(slide, 1000); // Slide every 2 seconds

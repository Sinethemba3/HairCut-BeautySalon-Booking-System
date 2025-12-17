//Image Slider
const slideshowImages = document.querySelectorAll(".intro .slideshow-img");

const nextImageDelay = 3000;
let currentImageCounter = 0;

// sliedshowImages[currentImageCounter].style.display = "block";
slideshowImages[currentImageCounter].style.opacity = 1;

setInterval(nextImage, nextImageDelay);

function nextImage() {
    // sliedshowImages[currentImageCounter].style.display = "none";
    // sliedshowImages[currentImageCounter].style.opacity = 0;
    slideshowImages[currentImageCounter].style.zIndex = -2;
    const tempCounter = currentImageCounter;
    setTimeout(() => {
        slideshowImages[tempCounter].style.opacity = 0;
    }, 1000);
    currentImageCounter = (currentImageCounter + 1) % slideshowImages.length;
    // sliedshowImages[currentImageCounter].style.display = "block";
    slideshowImages[currentImageCounter].style.opacity = 1;
    slideshowImages[currentImageCounter].style.zIndex = -1;
}
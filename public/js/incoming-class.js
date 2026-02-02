let currentSlide = 0;
const slides = document.querySelectorAll('.slide-course');
const dots = document.querySelectorAll('.dot');
const titleElement = document.getElementById('carouselTitle');

function showSlide(index) {
    // Hide all slides
    slides.forEach((slide, idx) => {
        slide.style.display = idx === index ? 'flex' : 'none';
    });

    // Update active dot
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');

    // Update title based on data-title attribute of the current slide
    titleElement.innerText = slides[index].getAttribute('data-title');

    // Update the current slide index
    currentSlide = index;
}

// Initial setup
showSlide(currentSlide);

// Optional: Automatic slide change (carousel effect)
setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}, 5000); // Change slide every 5 seconds

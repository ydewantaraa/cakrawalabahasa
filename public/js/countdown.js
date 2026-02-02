let currentSlide = 0;
const slides = document.querySelectorAll('.slide-course');
const dots = document.querySelectorAll('.dot');
const titleElement = document.getElementById('carouselTitle');
const countdownTimerElement = document.getElementById('countdownTimer');
const daysLeftElement = document.querySelector('.days-left');

function showSlide(index) {
    // Hide all slides and reset countdown
    slides.forEach((slide, idx) => {
        slide.style.display = idx === index ? 'flex' : 'none';
    });

    // Update active dot
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');

    // Update title based on data-title attribute of the current slide
    titleElement.innerText = slides[index].getAttribute('data-title');

    // Set up countdown for this slide
    const endDate = new Date(slides[index].getAttribute('data-end-date'));
    startCountdown(endDate);

    // Update the current slide index
    currentSlide = index;
}

// Function to start countdown for each slide
function startCountdown(endDate) {
    // Clear any existing countdown interval
    clearInterval(countdownInterval);

    function updateCountdown() {
        const now = new Date();
        const timeLeft = endDate - now;

        if (timeLeft <= 0) {
            countdownTimerElement.innerHTML = "⏳ Countdown finished";
            daysLeftElement.innerText = "0";
            clearInterval(countdownInterval);
            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        // Update Days Left and countdown timer
        daysLeftElement.innerText = days; // Updates the Days Left display
        countdownTimerElement.innerHTML = `⏳ ${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    // Start the countdown
    updateCountdown();
    countdownInterval = setInterval(updateCountdown, 1000);
}

// Initialize the first slide and start countdown
let countdownInterval;
showSlide(currentSlide);

// Optional: Automatic slide change (carousel effect)
setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}, 5000); // Change slide every 5 seconds
document.addEventListener("DOMContentLoaded", function () {
    let currentSlide = 0;

    const slides = document.querySelectorAll(".slide-course");
    const dots = document.querySelectorAll(".dot");
    const titleElement = document.getElementById("carouselTitle");
    const daysElement = document.getElementById("days");
    const timerElement = document.getElementById("countdownTimer");

    let countdownInterval = null;
    let slideInterval = null;
    timerElement.classList.add("text-gray-900");

    function startCountdown(endDate) {
        if (countdownInterval) {
            clearInterval(countdownInterval);
        }

        function updateCountdown() {
            const now = new Date();
            const diff = endDate - now;

            if (diff <= 0) {
                clearInterval(countdownInterval);
                daysElement.innerText = 0;
                timerElement.innerText = "⌛ Countdown Finished";
                timerElement.classList.remove("text-gray-900");
                timerElement.classList.add("text-orange-600");
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((diff / (1000 * 60)) % 60);
            const seconds = Math.floor((diff / 1000) % 60);

            daysElement.innerText = days;
            timerElement.innerText = `⏳ ${days}d ${hours}h ${minutes}m ${seconds}s`;
            timerElement.classList.remove("text-orange-600");
            timerElement.classList.add("text-gray-900");
        }

        // 🔥 langsung update tanpa nunggu 1 detik
        updateCountdown();

        countdownInterval = setInterval(updateCountdown, 1000);
    }

    function showSlide(index) {
        slides.forEach((slide, idx) => {
            slide.style.display = idx === index ? "flex" : "none";
        });

        dots.forEach((dot) => dot.classList.remove("active"));
        dots[index].classList.add("active");

        const title = slides[index].getAttribute("data-title");
        const endDateString = slides[index].getAttribute("data-end-date");

        titleElement.innerText = title;

        startCountdown(new Date(endDateString));

        currentSlide = index;
    }

    if (slides.length > 0) {
        showSlide(currentSlide);

        slideInterval = setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }, 5000);

        dots.forEach((dot, index) => {
            dot.addEventListener("click", () => {
                showSlide(index);
            });
        });
    }
});

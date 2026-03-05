document.querySelectorAll(".carousel").forEach((carouselEl) => {
    const trackEl = carouselEl.querySelector(".carousel-track");

    let isDragging = false;
    let startX = 0;
    let scrollLeft = 0;
    let autoScroll;

    // duplicate item supaya infinite
    trackEl.innerHTML += trackEl.innerHTML;

    function startAutoScroll() {
        clearInterval(autoScroll);

        autoScroll = setInterval(() => {
            carouselEl.scrollLeft += 0.4;

            if (carouselEl.scrollLeft >= trackEl.scrollWidth / 2) {
                carouselEl.scrollLeft = 0;
            }
        }, 20);
    }

    startAutoScroll();

    // ====================
    // DESKTOP DRAG
    // ====================

    carouselEl.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX - carouselEl.offsetLeft;
        scrollLeft = carouselEl.scrollLeft;

        clearInterval(autoScroll);
    });

    carouselEl.addEventListener("mousemove", (e) => {
        if (!isDragging) return;

        e.preventDefault();

        const x = e.pageX - carouselEl.offsetLeft;
        const walk = (x - startX) * 2;

        carouselEl.scrollLeft = scrollLeft - walk;
    });

    carouselEl.addEventListener("mouseup", () => {
        isDragging = false;
        startAutoScroll();
    });

    carouselEl.addEventListener("mouseleave", () => {
        isDragging = false;
        startAutoScroll();
    });

    // ====================
    // MOBILE SWIPE
    // ====================

    carouselEl.addEventListener("touchstart", (e) => {
        isDragging = true;
        startX = e.touches[0].pageX - carouselEl.offsetLeft;
        scrollLeft = carouselEl.scrollLeft;

        clearInterval(autoScroll);
    });

    carouselEl.addEventListener("touchmove", (e) => {
        if (!isDragging) return;

        const x = e.touches[0].pageX - carouselEl.offsetLeft;
        const walk = (x - startX) * 2;

        carouselEl.scrollLeft = scrollLeft - walk;
    });

    carouselEl.addEventListener("touchend", () => {
        isDragging = false;
        startAutoScroll();
    });
});

document.querySelectorAll(".carousel").forEach((carousel) => {
    const track = carousel.querySelector(".carousel-track");

    // duplikat item
    track.innerHTML += track.innerHTML;

    let isDragging = false;
    let startX = 0;
    let startScroll = 0;

    let half = 0;

    function setup() {
        half = track.scrollWidth / 2;
    }

    // tunggu layout selesai
    requestAnimationFrame(setup);

    function auto() {
        if (!isDragging && half > 0) {
            carousel.scrollLeft += 0.5;

            // infinite loop
            if (carousel.scrollLeft >= half) {
                carousel.scrollLeft -= half;
            }
        }

        requestAnimationFrame(auto);
    }

    requestAnimationFrame(auto);

    // DESKTOP
    carousel.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX;
        startScroll = carousel.scrollLeft;
    });

    carousel.addEventListener("mousemove", (e) => {
        if (!isDragging) return;

        const walk = (e.pageX - startX) * 2;
        carousel.scrollLeft = startScroll - walk;
    });

    window.addEventListener("mouseup", () => {
        isDragging = false;
    });

    // MOBILE
    carousel.addEventListener("touchstart", (e) => {
        isDragging = true;
        startX = e.touches[0].pageX;
        startScroll = carousel.scrollLeft;
    });

    carousel.addEventListener("touchmove", (e) => {
        if (!isDragging) return;

        const walk = (e.touches[0].pageX - startX) * 2;
        carousel.scrollLeft = startScroll - walk;
    });

    carousel.addEventListener("touchend", () => {
        isDragging = false;
    });
});

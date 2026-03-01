// carousel.js

document.addEventListener('alpine:init', () => {
    // Store untuk menyimpan data courses dari Blade
    Alpine.store('coursesData', {
        cards: window.coursesData || [] // fallback kalau data belum di-set
    });
});

// ===== Fungsi Swiper untuk Special Class =====
function specialClassSwiper(relatedPrograms) {
    return {
        specialCards: relatedPrograms || [],
        initSwiper() {
            new Swiper(".specialClassSwiper", {
                slidesPerView: 'auto',
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },
                speed: 4000,
                freeMode: true,
                grabCursor: true,
                allowTouchMove: true,
            });
        }
    }
}

// ===== Fungsi Carousel untuk Keunggulan =====
function carouselKeunggulan() {
    return {
        cards: [],
        loopedCards: [],
        position: 0,
        cardWidth: 240 + 16,
        speed: 0.5,
        interval: null,
        dragging: false,
        dragStartX: 0,
        dragStartPos: 0,

        init() {
            let uid = 0;
            if (!Array.isArray(this.cards)) {
                console.log("CARDS BUKAN ARRAY:", this.cards);
                return;
            }
            // loop cards 3x supaya infinite scroll
            this.loopedCards = [...this.cards, ...this.cards, ...this.cards]
                .map(card => ({ ...card, uniqueId: uid++ }));
            this.play();
        },

        play() {
            if (this.interval) return;
            this.interval = setInterval(() => {
                this.position += this.speed;
                const totalWidth = this.loopedCards.length * this.cardWidth;
                if (this.position >= totalWidth / 3) {
                    this.position = 0;
                }
            }, 16);
        },

        pause() {
            clearInterval(this.interval);
            this.interval = null;
        },

        startDrag(event) {
            this.pause();
            this.dragging = true;
            this.dragStartX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX;
            this.dragStartPos = this.position;
        },

        drag(event) {
            if (!this.dragging) return;
            const clientX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX;
            const deltaX = clientX - this.dragStartX;
            this.position = this.dragStartPos - deltaX;
            const totalWidth = this.loopedCards.length * this.cardWidth;
            if (this.position >= totalWidth / 3) {
                this.position = 0;
            } else if (this.position < 0) {
                this.position = totalWidth / 3 + this.position;
            }
        },

        endDrag() {
            this.dragging = false;
            this.play();
        }
    }
}

// ===== Fungsi Carousel Umum =====
function carousel(cards) {
    return {
        cards,
        position: 0,
        dragging: false,

        init() {
            // init kosong
        },

        startDrag(e) {
            this.dragging = true;
            this.dragStartX = e.touches?.[0]?.clientX || e.clientX;
            this.dragStartPos = this.position;
        },

        drag(e) {
            if (!this.dragging) return;
            const clientX = e.touches?.[0]?.clientX || e.clientX;
            let newPos = this.dragStartPos - (clientX - this.dragStartX);

            const wrap = this.$refs.wrapper;
            const inner = this.$refs.inner;
            const maxPos = inner.scrollWidth - wrap.clientWidth;

            if (newPos < 0) newPos = 0;
            if (newPos > maxPos) newPos = maxPos;

            this.position = newPos;
        },

        endDrag() {
            this.dragging = false;
        }
    }
}
document.addEventListener('DOMContentLoaded', () => {
    const els = document.querySelectorAll('.fade-el');
    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100','translate-y-0');
            } else {
                entry.target.classList.remove('opacity-100','translate-y-0');
            }
        });
    }, {
        threshold: 0.1
    });
    els.forEach(el => io.observe(el));
});
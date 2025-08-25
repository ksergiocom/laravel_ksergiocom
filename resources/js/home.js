document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".stagger-grid img");
    items.forEach(img => img.classList.add("show"));

    const header = document.querySelector('header');
    header.classList.add("translate-y-0", "opacity-100");

    const h1 = document.querySelector('h1');
    h1.classList.add("translate-x-0", "opacity-100");

    // Speech section
    const leftEl = document.getElementById("speech_left");
    const rightEl = document.getElementById("speech_right");

    const speechObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
if (entry.isIntersecting) {
    entry.target.classList.add("translate-x-0", "opacity-100");
    observer.unobserve(entry.target);
}
                observer.unobserve(entry.target); // Unobserve to animate only once
            }
        });
    }, {
        threshold: 0.2,
    });

    speechObserver.observe(leftEl);
    speechObserver.observe(rightEl);
});
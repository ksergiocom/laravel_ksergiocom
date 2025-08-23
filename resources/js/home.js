document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".stagger-grid img");
    items.forEach(img => img.classList.add("show"));

    const header = document.querySelector('header');
    header.classList.add("translate-y-0", "opacity-100");

    const h1 = document.querySelector('h1');
    h1.classList.add("translate-x-0", "opacity-100");

    // const speechParagraphs = document.querySelectorAll("#speech p");

    // const observer = new IntersectionObserver((entries, observer) => {
    //     entries.forEach(entry => {
    //         if (entry.isIntersecting) {
    //             entry.target.classList.remove("opacity-0", "translate-y-10");
    //             entry.target.classList.add("opacity-100", "translate-y-0");

    //             // Si es el párrafo con id="pero", activar puntos secuenciales
    //             if (entry.target.id === "pero") {
    //                 const dots = entry.target.querySelectorAll(".dot");
    //                 dots.forEach((dot, i) => {
    //                     setTimeout(() => {
    //                         dot.classList.remove("opacity-0");
    //                         dot.classList.add("opacity-100");
    //                     }, 130 * (i + 1)); // cada 500ms aparece uno
    //                 });
    //             }

    //             observer.unobserve(entry.target); // no repetir
    //         }
    //     });
    // }, { threshold: 0.1 });

    // speechParagraphs.forEach(p => observer.observe(p));
});

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ksergio.com</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .stagger-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, 3rem); /* columnas fijas de 3rem */
            gap: 0.5rem;
            justify-content: start; /* alinear a la izquierda */
        }

        /* Tamaño fijo para las imágenes */
        .stagger-grid img {
            width: 3rem;
            height: 3rem;
            object-fit: cover;
            /* asegura que no se deformen */
            border-radius: 9999px;
            /* sigue redondeado */
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
            transition-delay: calc(0.1s * var(--i));
        }

        .stagger-grid img.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

</head>

<body class="h-full w-full bg-gray-900 text-gray-100 p-7 md:w-sm mx-auto">
    <header class="mb-10">
        <h1 class="text-2xl font-bold text-white  underline underline-offset-4">ksergio<span
                class="text-white text-sm">.com</span></h1>
    </header>
    <main class="h-full w-full md:w-sm mx-auto">
        <section>
            <h2 class="text-5xl tracking-tight font-semibold text-gray-100 mb-10 md:mb-18">¿Que es <span class="text-gray-100">para tí</span> ser un <span
                    class="uppercase font-extrabold text-red-500 tracking-tighter">fullstack</span> ?</h2>
            <div class="stagger-grid">
                    @foreach ($tecnologias as $tecnologia)
                    <img style="--i: {{ $loop->index }}" class="h-12 w-12 bg-white rounded-full"
                        src="{{ Storage::url($tecnologia->imagen) }}" alt="{{ $tecnologia->nombre }}">
                    @endforeach
            </div>
            <h2 class="text-4xl tracking-tight font-semibold text-gray-100 mt-10 md:mt-18">Pero al final ...</h2>
            <p class="mt-5 leading-relaxed">
                La herramienta es  <strong>solo un medio</strong>.
                Lo que realmente me mueve es el <strong>pensamiento analítico</strong>, la búsqueda de eficiencia y la
                claridad en el diseño de soluciones.
                
            </p>
            <p class="mt-5 leading-relaxed">Las tecnologías cambian, pero la forma de pensar y la base sólida son lo que marcan <strong>la diferencia</strong>.</p>
        </section>
        <hr class="my-18">
        <section class="pb-20">
            <p>En construcción...</p>
        </section>
    </main>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const items = document.querySelectorAll(".stagger-grid img");
            items.forEach(img => {
                img.classList.add("show");
            })
        });
    </script>
</body>

</html>
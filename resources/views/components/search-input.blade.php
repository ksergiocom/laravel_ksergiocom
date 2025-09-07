<div class="flex flex-col gap-1 w-4/5 mx-auto relative" id="search-container">
    <input type="text" id="search-input" placeholder="¿Sobre qué quieres saber?"
        class="border border-gray-200 p-3 rounded-4xl shadow focus:shadow-lg transition text-center outline-0"  autocomplete="off" />

    <ul id="search-results"
        class="absolute top-full left-0 w-full border bg-white border-gray-200 rounded-xl shadow-lg mt-1 max-h-60 overflow-auto z-10
               opacity-0 translate-y-2 pointer-events-none transition-all duration-300">
    </ul>
</div>


<script>
 const input = document.getElementById('search-input');
const resultsContainer = document.getElementById('search-results');
const container = document.getElementById('search-container');

input.addEventListener('input', async () => {
    const query = input.value.trim();

    if (!query) {
        hideResults();
        return;
    }

    try {
        const response = await fetch(`/ajax/posts/search?filtro=${encodeURIComponent(query)}`);
        const posts = await response.json();

        if (posts.length === 0) {
            resultsContainer.innerHTML = '<li class="p-3 px-5 text-center text-gray-400">No hay resultados</li>';
        } else {
            resultsContainer.innerHTML = posts.map(post => `
                <li class="cursor-pointer border-b border-gray-100 last:border-0 hover:bg-gray-100">
                    <a href="/${post.slug}" class="block w-full h-full p-3 px-5">${post.titulo}</a>
                </li>
            `).join('');
        }

        showResults();

    } catch (error) {
        console.error(error);
    }
});

document.addEventListener('click', (e) => {
    if (!container.contains(e.target)) {
        hideResults();
    }
});

function showResults() {
    // Siempre forzar reflow antes de aplicar la clase
    resultsContainer.classList.remove('translate-y-2', 'opacity-0', 'pointer-events-none');
    void resultsContainer.offsetWidth; // reflow
    resultsContainer.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
}

function hideResults() {
    resultsContainer.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
    resultsContainer.classList.add('translate-y-2', 'opacity-0', 'pointer-events-none');
}

</script>
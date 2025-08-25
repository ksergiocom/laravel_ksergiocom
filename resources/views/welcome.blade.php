<x-layout :hide-navbar="true">

    <main class="snap-y snap-mandatory overflow-y-scroll h-screen">
        <section id="hero" class="snap-start w-full min-h-screen flex flex-col sm:justify-between">
            <x-navbar class="-translate-y-32 opacity-0 transition duration-500" />
            <div class="stagger-grid sm:order-2 order-3 max-w-xl w-full m-auto">
                @foreach ($tecnologias as $tecnologia)
                    <img style="--i: {{ $loop->index }}"
                        class="h-12 w-12 bg-white rounded-full shadow-xl border border-gray-200"
                        src="{{ Storage::url($tecnologia->imagen) }}" alt="{{ $tecnologia->nombre }}">
                @endforeach
            </div>
            <h1
                class="text-4xl p-5 mt-15 opacity-0 -translate-x-full duration-500 text-center sm:text-left sm:text-7xl sm:order-3 order-2 font-bold tracking-tighter">
                ¿Que es para tí <br /> ser un <strong
                    class="uppercase font-extrabold text-red-600 underline">fullstack</strong>
                ?
            </h1>
        </section>

        <section id="speech" class="snap-start min-h-screen p-10 flex flex-col gap-14 max-w-4xl mx-auto justify-center items-center">
                <h2 id="speech_left" class="duration-500 opacity-0 w-3/4 mr-auto text-3xl sm:text-6xl text-left">Sí, <span
                        class="text-red-600 font-extrabold tracking-tighter">conocer</span> las herramientas <br />
                    <span class="text-black font-bold">es importante</span></span>, pero...
                </h2>
                <h2 id="speech_right" class=" duration-500 opacity-0 w-3/4 ml-auto text-3xl sm:text-5xl text-right delay-500">Las tecnologías cambian, <br /> pero <span
                        class="font-bold text-black">la base de conocimiento </span> <br /> marca la <span
                        class="text-red-600 font-extrabold">diferencia</span>.
                </h2>
        </section>
        <section id="blog" class="snap-start min-h-screen p-10">
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                @foreach ($posts as $post)
                    <x-post.card :$post></x-post.card>
                @endforeach
            </div>
        </section>
    </main>


</x-layout>
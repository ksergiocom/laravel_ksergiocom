<x-layout :hide-navbar="true">

    <section id="hero" class="w-full min-h-dvh flex flex-col sm:justify-between">
        <x-navbar class="-translate-y-32 opacity-0 transition duration-500" />

        <div class="stagger-grid sm:order-2 order-3 max-w-xl w-full m-auto">
            @foreach ($tecnologias as $tecnologia)
                <img style="--i: {{ $loop->index }}" class="h-12 w-12 bg-white rounded-full"
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


</x-layout>
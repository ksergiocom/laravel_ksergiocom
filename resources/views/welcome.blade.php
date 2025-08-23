@extends('layout.base')

@section('content')
    @push('styles')
        @vite(['resources/css/home.css'])
    @endpush

    <section id="hero" class="w-full min-h-dvh bg-black flex flex-col sm:justify-between p-5">
        @include('layout.navbar')

        <div class="stagger-grid sm:order-2 order-3 max-w-xl w-full m-auto">
            @for($i = 0; $i < 10; $i++)
                @foreach ($tecnologias as $tecnologia)
                    <img style="--i: {{ $loop->index }}" class="h-12 w-12 bg-white rounded-full"
                        src="{{ Storage::url($tecnologia->imagen) }}" alt="{{ $tecnologia->nombre }}">
                @endforeach
            @endfor
        </div>

        <h1
            class="text-4xl mt-15 opacity-0 -translate-x-full duration-500 text-center sm:text-left sm:text-7xl sm:order-3 order-2 text-white font-bold tracking-tighter">
            ¿Que es para tí <br /> ser un <strong class="uppercase font-extrabold text-red-600 underline">fullstack</strong>
            ?
        </h1>
    </section>





    @push('scripts')
        @vite(['resources/js/home.js'])
    @endpush
@endsection
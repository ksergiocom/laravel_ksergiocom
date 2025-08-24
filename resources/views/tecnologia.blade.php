@extends('layout.base')

@section('content')
    @include('layout.navbar-static')
    <div class="p-5">

        <a class="inline-block mb-5 text-red-500 underline underline-offset-2" href="{{ route('welcome') }}">&larr; volver</a>    

        <h2>{{ $tecnologia->nombre }}</h2>
        <img class="bg-gray-100 h-16 w-16 rounded-full my-10" src="{{ Storage::url($tecnologia->imagen) }}">
        <p>
            {{ $tecnologia->descripcion }}
        </p>

    </div>

@endsection
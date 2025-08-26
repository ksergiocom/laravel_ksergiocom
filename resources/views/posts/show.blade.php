<x-layout :hideNavbar="false" :metaDescription="$post->descripcion" :title="$post->titulo">
    <div class="relative w-full max-w-4xl mx-auto">
        <div class="markdown">
            <div class="flex items-center gap-5">
                <div class="flex items-center gap-2 mb-0">
                    <!-- <h5 class="text-sm">Temas:</h5> -->
                    <ul class="flex tecnologias">
                        @foreach ($post->tecnologias as $tecnologia)
                            <li>
                                <img class="" src="{{ Storage::url($tecnologia->imagen) }}"
                                    alt="{{ $tecnologia->nombre }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
                <h5 class="text-sm">Publicado {{ $post->creado_hace }} </h5>
            </div>
            <h1 style="view-transition-name: titulo-{{ $post->id }}">{{ $post->titulo }}</h1>
            @if($post->imagen)
                <img class="portada" src="{{ Storage::url($post->imagen?->imagen) }}" alt="{{ $post->titulo }}"
                    style="view-transition-name: imagen-{{ $post->id }}" />
            @endif
            <x-markdown theme="github-dark">
                {!! $post->markdown !!}
            </x-markdown>
        </div>
    </div>
</x-layout>
<div class="sm:rounded-xl sm:shadow-xl overflow-hidden sm:border border-t border-b border-gray-200">
    <a href="{{ route('post.show', ['slug' => $post->slug]) }}">
        @if($post->imagen)
            <img class="object-cover sm:border-b border-gray-200" src="{{ Storage::url($post->imagen?->imagen) }}"
                alt="{{ $post->titulo }}" style="view-transition-name: imagen-{{ $post->id }}" />
        @endif
    </a>
    <div class="p-5 flex flex-col gap-2">
        <h4 class="font-semibold opacity-50"><small>{{ $post->creado_hace }}</small></h4>
        <a class="text-black hover:underline underline-offset-2 inline-block mb-1"
            href="{{ route('post.show', ['slug' => $post->slug]) }}">
            <h3 class=" text-3xl tracking-tight font-bold" style="view-transition-name: titulo-{{ $post->id }}">
                {{ $post->titulo }}</h3>
        </a>
        <div class="flex items-center gap-5 mb-3">
            <ul class="flex ml-4">
                @foreach ($post->tecnologias as $tecnologia)
                    <li class="-ml-4">
                        <img class="h-10 w-10 rounded-full shadow-xl border border-gray-300"
                            src="{{ Storage::url($tecnologia->imagen) }}" alt="{{ $tecnologia->nombre }}" />
                    </li>
                @endforeach
            </ul>
        </div>
        <p class="tracking-tight text-gray-600">{{ $post->descripcion }}</p>
        <a class="inline-block mt-3 hover:text-black tracking-wider hover:underline underline-offset-2"
            href="{{ route('post.show', ['slug' => $post->slug]) }}">Seguir leyendo</a>

    </div>
</div>
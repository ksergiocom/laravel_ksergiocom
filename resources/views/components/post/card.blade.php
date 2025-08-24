<div class="max-w-md bg-gray-500 shadow rounded-2xl overflow-hidden">
    @if($previewImage)
        <img src="{{ $previewImage }}" alt="Preview image" class="w-full h-48 object-cover">
    @endif
    

    <div class="p-5">
        <h2 class="text-2xl font-extrabold mb-2">{{ $post->titulo }}</h2>
        <p class="">{{ $previewText }}</p>
        <a href="{{ route('post.show', ['slug' => $post->slug]) }}" class="inline-block p-2 border border-gray-100 rounded">Continuar leyendo</a>
    </div>
</div>
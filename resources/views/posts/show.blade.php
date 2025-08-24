<x-layout :hideNavbar="false">
    <div class="full_post">
        <p><a href="{{ route('post.index') }}">&larr; volver</a></p>
        <x-markdown  theme="github-dark">
            {!!   $post->markdown !!}
        </x-markdown>
    </div>
</x-layout>

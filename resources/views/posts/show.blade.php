<x-layout :hideNavbar="false">
        {{-- <div class="flex gap-5 items-center p-7">
            <ul class="flex -space-x-4">
                @foreach ($post->tecnologias as $index => $tecnologia)
                <li class="relative z-{{ count($post->tecnologias) - $index }}">
                    <img class="h-12 w-12 rounded-full shadow-xl border border-gray-200"
                        src="{{ Storage::url($tecnologia->imagen) }}" alt="{{ $tecnologia->nombre }}" />
                </li>
                @endforeach
            </ul> --}}
        <div class="markdown">
            <x-markdown theme="github-dark">
                {!!   $post->markdown !!}
            </x-markdown>
        </div>
    </main>
</x-layout>
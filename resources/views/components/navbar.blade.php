<header {{ $attributes->merge(['class' => 'p-5 w-full z-10 text-gray-100']) }}>
    <div class="flex justify-between items-center" >
        <a class="" href="{{ route('welcome') }}">
            <h3 class="text-lg sm:text-2xl tracking-tighter underline-offset-2 text-black">ksergio<span class="sm:text-lg text-gray-700">.com</span></h3>
        </a>
        {{-- <ul class="gap-5 hidden sm:flex">
            <li>
                <a class="text-gray-800 hover:text-black hover:underline underline-offset-2" href="{{ route('welcome') }}">Inicio</a>
            </li>
            <li>
                <a class="text-gray-800 hover:text-black hover:underline underline-offset-2" href="{{ route('post.index') }}">Blog</a>
            </li>
            <li>
                <a class="text-gray-800 hover:text-black hover:underline underline-offset-2" href="https://github.com/ksergiocom">Sobre mí</a>
            </li>
        </ul> --}}
        <h3 class="inline-block">
            <a href="https://github.com/ksergiocom">
                <img src="{{ asset('images/github-mark.svg') }}" alt="github-logo" class="w-6 h-6 opacity-80 hover:opacity-100">
            </a>
        </h3>
        {{-- <h2 class="sm:hidden text-xl inline-block">&larr;</h2> --}}
    </div>
</header>
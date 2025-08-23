<header class="w-full z-10 shadow text-gray-100 -translate-y-32 opacity-0 transition duration-500">
    <div class="flex justify-between items-center" >
        <a class="" href="{{ route('welcome') }}">
            <h3 class="text-lg sm:text-2xl tracking-tighter underline-offset-2 text-white">ksergio<span class="sm:text-lg text-gray-500">.com</span></h3>
        </a>
        <ul class="gap-5 hidden sm:flex">
            <li>
                <a class="text-gray-200 hover:text-white hover:underline underline-offset-2" href="/">Inicio</a>
            </li>
            <li>
                <a class="text-gray-200 hover:text-white hover:underline underline-offset-2" href="https://github.com/ksergiocom">Blog</a>
            </li>
            <li>
                <a class="text-gray-200 hover:text-white hover:underline underline-offset-2" href="https://github.com/ksergiocom">Sobre mí</a>
            </li>
        </ul>
        <h3 class="hidden sm:inline-block">
            <a href="https://github.com/ksergiocom">
                <img src="{{ asset('images/github-mark.svg') }}" alt="github-logo" class="w-6 h-6 opacity-80 hover:opacity-100">
            </a>
        </h3>
        {{-- <h2 class="sm:hidden text-xl inline-block">&larr;</h2> --}}
    </div>
</header>
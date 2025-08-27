<x-layout :hideNavbar="false">
    <main class="mt-24 flex flex-col gap-5 p-10 justify-center items-center text-center">
        <h1 class="text-4xl sm:text-7xl font-bold"><span class="font-extrabold text-red-600">¡Woups!</span><br> Aquí no hay nada</h1>
        <a class="hover:text-black sm:text-xl mt-10 underline underline-offset-2" href="{{ route('welcome') }}">&larr; Volver al inicio</a>
    </main>
</x-layout>
<x-layout :hide-navbar="false"> 
    <main class="p-5 ">
        <h1>posts</h1>   
        @foreach ($posts as $post)
            <x-post.card :$post/>
        @endforeach
    </main>
</x-layout>
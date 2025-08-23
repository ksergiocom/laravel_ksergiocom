@extends('layout.base')

@section('content')
    <x-markdown theme="github-dark">
        {!!   $post->markdown !!}
    </x-markdown>
@endsection
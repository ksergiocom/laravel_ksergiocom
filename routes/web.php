<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

use App\Models\Tecnologia;

Route::get('/', function () {
    $tecnologias = Tecnologia::all();
    $posts = Post::all();
    
    return view('welcome', [
        'tecnologias' => $tecnologias,
        'posts' => $posts,
    ]);
})->name('welcome');

Route::get('/{slug}', [PostController::class, 'show'])->name('post.show');
<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TecnologiaController;
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

Route::get('/stack/{nombre}', [TecnologiaController::class,'show'])->name('tecnologia.show');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/{slug}', [PostController::class, 'show'])->name('post.show');
<?php

use Illuminate\Support\Facades\Route;

use App\Models\Tecnologia;

Route::get('/', function () {
    $tecnologias = Tecnologia::all();
    
    return view('welcome', [
        'tecnologias' => $tecnologias,
    ]);
});

<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(String $slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();

        return view('post', [
            'post' => $post,
        ]);
    }
}

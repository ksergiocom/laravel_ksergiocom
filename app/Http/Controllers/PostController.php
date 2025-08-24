<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(String $slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();

        return view('posts.show', [
            'post' => $post,
        ]);
    }
}

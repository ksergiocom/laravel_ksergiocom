<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function search(Request $request){
        $query = $request->query('filtro');

        $posts = Post::where(function($q) use ($query) {
                $q->where('titulo', 'like', "%{$query}%")
                  ->orWhere('slug', 'like', "%{$query}%")
                  ->orWhere('imagen_id', 'like', "%{$query}%")
                  ->orWhere('markdown', 'like', "%{$query}%")
                  ->orWhere('descripcion', 'like', "%{$query}%");
            })
            ->orWhereHas('tecnologias', function($q) use ($query) {
                $q->where('nombre', 'like', "%{$query}%");
            })
            ->get();

        return $posts;
    }
}

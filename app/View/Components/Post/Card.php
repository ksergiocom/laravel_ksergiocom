<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class Card extends Component
{
    public Post $post;

    /**
     * Create a new component instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function render(): View|Closure|string
    {
        return view('components.post.card');
    }
}

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
    public string $previewText;
    public ?string $previewImage;

    /**
     * Create a new component instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;

        $content = app(MarkdownRenderer::class)->toHtml($this->post->markdown);

        // 1. Extraer primera imagen
        $this->previewImage = $this->extractFirstImage($content);

        // 2. Sacar texto plano y truncarlo
        $this->previewText = $this->extractPreviewText($content);
    }

    private function extractFirstImage(string $html): ?string
    {
        if (preg_match('/<img[^>]+src="([^">]+)"/i', $html, $matches)) {
            return $matches[1];
        }
        return null;
    }

    private function extractPreviewText(string $html): string
    {
        $text = strip_tags($html); // eliminar etiquetas HTML
        $text = preg_replace('/\s+/', ' ', $text); // limpiar saltos de línea y espacios dobles
        return mb_strimwidth(trim($text), 0, 600, '...');
    }

    public function render(): View|Closure|string
    {
        return view('components.post.card');
    }
}

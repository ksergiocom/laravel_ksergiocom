<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public bool $hideNavbar = false;
    public string $title;
    public string $metaDescription;

    /**
     * @param bool $hideNavbar
     * @param string|null $title
     * @param string|null $metaDescription
     */
    public function __construct(bool $hideNavbar = false, string $title = null, string $metaDescription = null)
    {
        $this->hideNavbar = $hideNavbar;

        $this->title = $title ?? 'ksergio.com';

        $this->metaDescription = $metaDescription;

    }

    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}

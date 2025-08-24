<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class layout extends Component
{
    public bool $hideNavbar = false;
    public string $title;
    public string $metaDescription = 'Blog de programación fullstack donde comparto experiencias y proyectos en frontend, backend, DevOps y administración de sistemas. Me apasiona Linux, desarrollo web y software, y compagino trabajo y estudios mientras aprendo y enseño sobre tecnología. ';

    /**
     * Generar el componente de layout para las páginas
     * 
     * @param bool $hideNavbar Generar un layout sin el navbar por defecto
     * @param string $title Generar un titulo para el tag de <title>
     * @param string $metaDescription Agregar a la descripción común alguna descripción adicional
     */
    public function __construct(bool $hideNavbar, string $title=null, string $metaDescription=null)
    {
        $this->hideNavbar = $hideNavbar;

        if($title){
            $this->title = $title;
        }

        if($metaDescription){
            $this->metaDescription .= $metaDescription;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}

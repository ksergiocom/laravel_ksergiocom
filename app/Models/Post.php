<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'titulo',
        'slug',
        'markdown',
        'descripcion',
    ];

    // --- Métodos -------------------------------------------------

    // Sacar la primera imagen que haya de mi markdown
    public function urlPrimeraImagen(): ?string
    {
        if (!$this->markdown) {
            return null;
        }

        // Buscar la primera imagen en formato markdown
        if (preg_match('/!\[.*?\]\((.*?)\)/', $this->markdown, $matches)) {
            return $matches[1]; // la URL de la primera imagen
        }

        return null;
    }

    // Accessor para "creado hace ..."
    public function getCreadoHaceAttribute()
    {
        return $this->created_at->locale('es')->diffForHumans();
    }

    // --- Relaciones ----------------------------------------------

    public function tecnologias()
    {
        return $this->belongsToMany(Tecnologia::class, 'post_tecnologia', 'post_id', 'tecnologia_id')
            ->withTimestamps();
    }



}

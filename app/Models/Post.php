<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'titulo',
        'slug',
        'imagen_id',
        'markdown',
        'descripcion',
    ];

    // --- Métodos -------------------------------------------------

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

    public function imagen(): BelongsTo
    {
        return $this->belongsTo(Imagen::class);
    }

}

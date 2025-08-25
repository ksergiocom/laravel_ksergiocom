<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Tecnologia extends Model
{
    protected $table = 'tecnologias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
    ];

    protected static function booted(): void
    {
        static::deleted(function (Tecnologia $tecnologia) {
            Storage::disk('public')->delete($tecnologia->imagen);
        });
    }


    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tecnologia', 'tecnologia_id', 'post_id')
            ->withTimestamps();
    }

}

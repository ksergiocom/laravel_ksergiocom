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
}

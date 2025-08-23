<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = [
        'imagen',
        'size',
    ];

    /**
     * Accesor para obtener el tamaño en MB
     */
    public function getSizeMbAttribute(): float
    {
        return round($this->size / (1024 * 1024), 2); // Redondea a 2 decimales
    }

    /**
     * Accesor para saber el nombre
     */
    public function getBaseNameAttribute(): string
    {
        return basename($this->imagen);
    }
}

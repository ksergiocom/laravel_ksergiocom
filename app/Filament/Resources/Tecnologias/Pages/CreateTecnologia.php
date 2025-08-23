<?php

namespace App\Filament\Resources\Tecnologias\Pages;

use App\Filament\Resources\Tecnologias\TecnologiaResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class CreateTecnologia extends CreateRecord
{
    protected static string $resource = TecnologiaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (! empty($data['imagen'])) {
            // Ruta relativa dentro de storage/app/public
            $path = $data['imagen']; 

            // Obtenemos el contenido del fichero original
            $disk = Storage::disk('public');
            $file = $disk->get($path);

            // Creamos la imagen con Intervention
            $image = Image::read($file);

            // Nombre nuevo con extensión .webp
            $newPath = preg_replace('/\.[^.]+$/', '.webp', $path);

            // Guardamos en disco en formato webp (calidad 90)
            $disk->put($newPath, (string) $image->encodeByExtension('webp', 90));

            // Borramos el fichero original
            $disk->delete($path);

            // Actualizamos el path en el modelo
            $data['imagen'] = $newPath;
        }

        return $data;
    }
}

<?php

namespace App\Filament\Resources\Imagens\Pages;

use App\Filament\Resources\Imagens\ImagenResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class CreateImagen extends CreateRecord
{
    protected static string $resource = ImagenResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['imagen'])) {
            $disk = Storage::disk('public');
            $path = $data['imagen'];
            $file = $disk->get($path);

            $image = Image::read($file);
            $image = $image->coverDown(1920, 1080);

            // Guardar en .webp preservando el nombre
            $newPath = preg_replace('/\.[^.]+$/', '.webp', $path);
            $disk->put($newPath, (string) $image->encodeByExtension('webp', 90));

            // Borrar archivo original
            $disk->delete($path);

            // Actualizar path y tamaño en bytes
            $data['imagen'] = $newPath;
            $data['size'] = $disk->size($newPath);
        }

        return $data;
    }
}

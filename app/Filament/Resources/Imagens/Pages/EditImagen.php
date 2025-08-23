<?php

namespace App\Filament\Resources\Imagens\Pages;

use App\Filament\Resources\Imagens\ImagenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditImagen extends EditRecord
{
    protected static string $resource = ImagenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\Imagens\Pages;

use App\Filament\Resources\Imagens\ImagenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListImagens extends ListRecords
{
    protected static string $resource = ImagenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

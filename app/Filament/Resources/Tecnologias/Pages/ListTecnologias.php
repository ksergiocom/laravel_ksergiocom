<?php

namespace App\Filament\Resources\Tecnologias\Pages;

use App\Filament\Resources\Tecnologias\TecnologiaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTecnologias extends ListRecords
{
    protected static string $resource = TecnologiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

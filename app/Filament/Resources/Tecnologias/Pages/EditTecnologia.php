<?php

namespace App\Filament\Resources\Tecnologias\Pages;

use App\Filament\Resources\Tecnologias\TecnologiaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTecnologia extends EditRecord
{
    protected static string $resource = TecnologiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

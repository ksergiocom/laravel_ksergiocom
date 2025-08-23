<?php

namespace App\Filament\Resources\Tecnologias\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

use Filament\Schemas\Schema;

class TecnologiaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->unique(),
                Textarea::make('descripcion')
                    ->required(),
                FileUpload::make('imagen')
                    ->required()
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->disk('public')
                    ->directory('tecnologias'),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Imagens\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ImagenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('imagen')
                ->required()
                ->image()
                ->imageEditor()
                ->imageCropAspectRatio('16:9')
                ->preserveFilenames()
                ->maxWidth('1920')
                ->disk('public')
                ->directory('imagenes'),
            ]);
    }
}

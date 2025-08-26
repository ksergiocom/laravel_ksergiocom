<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Imagen;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')->required()->unique(),
                TextInput::make('slug')->required()->unique(),
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->rows(4),
                Select::make('tecnologias')
                    ->label('Tecnologías')
                    ->multiple()
                    ->relationship('tecnologias', 'nombre')
                    ->preload()
                    ->searchable(),
                Select::make('imagen_id')
                    ->label('Imagen portada')
                    ->nullable()
                    ->options(function () {
                        // Devuelve un array [id => nombre o url] de todas las imágenes
                        return Imagen::all()->pluck('imagen', 'id')->toArray();
                    })
                    ->searchable(),
                MarkdownEditor::make('markdown')->required(),
            ]);
    }
}

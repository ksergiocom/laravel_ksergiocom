<?php

namespace App\Filament\Resources\Posts\Schemas;

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
                MarkdownEditor::make('markdown')->required(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\MarkdownEditor;
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
                MarkdownEditor::make('markdown')->required(),
            ]);
    }
}

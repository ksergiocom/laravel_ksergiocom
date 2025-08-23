<?php

namespace App\Filament\Resources\Imagens;

use App\Filament\Resources\Imagens\Pages\CreateImagen;
use App\Filament\Resources\Imagens\Pages\EditImagen;
use App\Filament\Resources\Imagens\Pages\ListImagens;
use App\Filament\Resources\Imagens\Schemas\ImagenForm;
use App\Filament\Resources\Imagens\Tables\ImagensTable;
use App\Models\Imagen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ImagenResource extends Resource
{
    protected static ?string $model = Imagen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return ImagenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImagensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListImagens::route('/'),
            'create' => CreateImagen::route('/create'),
            'edit' => EditImagen::route('/{record}/edit'),
        ];
    }
}

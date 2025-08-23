<?php

namespace App\Filament\Resources\Tecnologias;

use App\Filament\Resources\Tecnologias\Pages\CreateTecnologia;
use App\Filament\Resources\Tecnologias\Pages\EditTecnologia;
use App\Filament\Resources\Tecnologias\Pages\ListTecnologias;
use App\Filament\Resources\Tecnologias\Pages\ViewTecnologia;
use App\Filament\Resources\Tecnologias\Schemas\TecnologiaForm;
use App\Filament\Resources\Tecnologias\Schemas\TecnologiaInfolist;
use App\Filament\Resources\Tecnologias\Tables\TecnologiasTable;
use App\Models\Tecnologia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TecnologiaResource extends Resource
{
    protected static ?string $model = Tecnologia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return TecnologiaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TecnologiasTable::configure($table);
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
            'index' => ListTecnologias::route('/'),
            'create' => CreateTecnologia::route('/create'),
            'edit' => EditTecnologia::route('/{record}/edit'),
        ];
    }
}

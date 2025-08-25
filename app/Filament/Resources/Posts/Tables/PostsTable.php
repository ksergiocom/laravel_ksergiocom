<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->sortable()->searchable(),
                ImageColumn::make('tecnologias.imagen')
                    ->label('Tecnologías')
                    ->disk('public')
                    ->visibility('public')
                    ->circular() // redondeadas tipo avatar
                    ->stacked()  // apiladas
                    ->limit(3) // muestra solo 3 y un contador con el resto
                    ->limitedRemainingText(),  
                TextColumn::make('updated_at')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Imagens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ImagensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Preview')
                    ->disk('public')
                    ->visibility('public')
                    ->square(),
                TextColumn::make('base_name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(query: fn (Builder $query, string $search): Builder => $query->where('imagen', 'like', "%{$search}%")),
                TextColumn::make('updated_at')->sortable(),
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

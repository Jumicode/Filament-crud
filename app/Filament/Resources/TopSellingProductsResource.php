<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopSellingProductsResource\Pages;
use App\Filament\Resources\TopSellingProductsResource\RelationManagers;
use App\Models\TopSellingProducts;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopSellingProductsResource extends Resource
{
    protected static ?string $model = TopSellingProducts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')->label('Producto')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('created_at')->label('Fecha de Creación')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTopSellingProducts::route('/'),
            'create' => Pages\CreateTopSellingProducts::route('/create'),
            'edit' => Pages\EditTopSellingProducts::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
{
    return Product::withCount('orders')
        ->orderBy('orders_count', 'desc');
}
}

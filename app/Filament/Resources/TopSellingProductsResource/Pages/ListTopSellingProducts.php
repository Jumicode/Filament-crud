<?php

namespace App\Filament\Resources\TopSellingProductsResource\Pages;

use App\Filament\Resources\TopSellingProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopSellingProducts extends ListRecords
{
    protected static string $resource = TopSellingProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

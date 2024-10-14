<?php

namespace App\Filament\Resources\TopSellingProductsResource\Pages;

use App\Filament\Resources\TopSellingProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopSellingProducts extends EditRecord
{
    protected static string $resource = TopSellingProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DetailCheckoutResource\Pages;

use App\Filament\Resources\DetailCheckoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailCheckouts extends ListRecords
{
    protected static string $resource = DetailCheckoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

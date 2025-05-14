<?php

namespace App\Filament\Resources\TransactionV2Resource\Pages;

use App\Filament\Resources\TransactionV2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionV2S extends ListRecords
{
    protected static string $resource = TransactionV2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

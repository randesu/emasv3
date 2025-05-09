<?php

namespace App\Filament\Resources\DetailCheckoutResource\Pages;

use App\Filament\Resources\DetailCheckoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailCheckout extends EditRecord
{
    protected static string $resource = DetailCheckoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

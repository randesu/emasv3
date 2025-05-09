<?php

namespace App\Filament\Resources\HerobannerResource\Pages;

use App\Filament\Resources\HerobannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHerobanner extends EditRecord
{
    protected static string $resource = HerobannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

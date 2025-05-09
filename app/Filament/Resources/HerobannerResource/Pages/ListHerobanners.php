<?php

namespace App\Filament\Resources\HerobannerResource\Pages;

use App\Filament\Resources\HerobannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHerobanners extends ListRecords
{
    protected static string $resource = HerobannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

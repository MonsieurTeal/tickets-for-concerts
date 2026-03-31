<?php

namespace App\Filament\Resources\Bands\Pages;

use App\Filament\Resources\Bands\BandResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBands extends ListRecords
{
    protected static string $resource = BandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

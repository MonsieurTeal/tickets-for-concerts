<?php

namespace App\Filament\Resources\Concerts\Pages;

use App\Filament\Resources\Concerts\ConcertsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConcerts extends ListRecords
{
    protected static string $resource = ConcertsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

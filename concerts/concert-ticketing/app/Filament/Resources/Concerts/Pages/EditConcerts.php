<?php

namespace App\Filament\Resources\Concerts\Pages;

use App\Filament\Resources\Concerts\ConcertsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditConcerts extends EditRecord
{
    protected static string $resource = ConcertsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

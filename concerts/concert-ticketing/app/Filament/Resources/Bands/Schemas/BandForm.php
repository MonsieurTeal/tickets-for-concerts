<?php

namespace App\Filament\Resources\Bands\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Band Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('genre')
                    ->label('Genre')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}

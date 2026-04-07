<?php

namespace App\Filament\Resources\Concerts\Schemas;

use Dom\Text;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ConcertsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('band_id')
                    ->relationship('band', 'name')
                    ->required()
                    ->label('Band'),
                DatePicker::make('date')
                    ->required()
                    ->label('Date'),
                TextInput::make('location')
                    ->required()
                    ->label('Location'),
            ]);
    }
}

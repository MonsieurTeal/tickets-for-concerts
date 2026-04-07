<?php

namespace App\Filament\Resources\Concerts;

use App\Filament\Resources\Concerts\Pages\CreateConcerts;
use App\Filament\Resources\Concerts\Pages\EditConcerts;
use App\Filament\Resources\Concerts\Pages\ListConcerts;
use App\Filament\Resources\Concerts\Schemas\ConcertsForm;
use App\Filament\Resources\Concerts\Tables\ConcertsTable;
use App\Models\Concerts;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConcertsResource extends Resource
{
    protected static ?string $model = \App\Models\Concert::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Concert';

    public static function form(Schema $schema): Schema
    {
        return ConcertsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConcertsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConcerts::route('/'),
            'create' => CreateConcerts::route('/create'),
            'edit' => EditConcerts::route('/{record}/edit'),
        ];
    }
}

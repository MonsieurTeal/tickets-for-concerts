<?php

namespace App\Filament\Resources\Bands;

use App\Filament\Resources\Bands\Pages\CreateBand;
use App\Filament\Resources\Bands\Pages\EditBand;
use App\Filament\Resources\Bands\Pages\ListBands;
use App\Filament\Resources\Bands\Schemas\BandForm;
use App\Filament\Resources\Bands\Tables\BandTable;
use App\Models\Band;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BandResource extends Resource
{
    protected static ?string $model = Band::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BandForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BandTable::configure($table);
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
            'index' => ListBands::route('/'),
            'create' => CreateBand::route('/create'),
            'edit' => EditBand::route('/{record}/edit'),
        ];
    }
}

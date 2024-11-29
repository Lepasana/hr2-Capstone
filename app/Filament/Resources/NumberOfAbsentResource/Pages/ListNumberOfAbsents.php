<?php

namespace App\Filament\Resources\NumberOfAbsentResource\Pages;

use App\Filament\Resources\NumberOfAbsentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNumberOfAbsents extends ListRecords
{
    protected static string $resource = NumberOfAbsentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

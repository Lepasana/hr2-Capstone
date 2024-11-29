<?php

namespace App\Filament\Resources\NumberOfAbsentResource\Pages;

use App\Filament\Resources\NumberOfAbsentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNumberOfAbsent extends EditRecord
{
    protected static string $resource = NumberOfAbsentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

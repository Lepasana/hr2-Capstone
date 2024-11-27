<?php

namespace App\Filament\Resources\TimeAndAttendanceResource\Pages;

use App\Filament\Resources\TimeAndAttendanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimeAndAttendances extends ListRecords
{
    protected static string $resource = TimeAndAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

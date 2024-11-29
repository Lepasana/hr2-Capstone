<?php

namespace App\Filament\Resources\FileLeaveResource\Pages;

use App\Filament\Resources\FileLeaveResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFileLeaves extends ListRecords
{
    protected static string $resource = FileLeaveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

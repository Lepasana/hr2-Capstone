<?php

namespace App\Filament\Resources\FileLeaveResource\Pages;

use App\Filament\Resources\FileLeaveResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileLeave extends EditRecord
{
    protected static string $resource = FileLeaveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

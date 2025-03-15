<?php
namespace App\Filament\Widgets;

use App\Models\Announcement;
use Filament\Widgets\Widget;

class AnnouncementWidget extends Widget
{
    protected static ?int $sort                = 3;
    protected int|string|array $columnSpan = 'full';
    protected static string $view = 'filament.widgets.announcement-widget';

    public function getViewData(): array
    {
        return [
            'announcement' => Announcement::latest()->first(), // Fix incorrect method chaining
        ];
    }
}

<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum LeaveTypeEnum: string
{
    use EnumsWithOptions;

    case SICK_LEAVE = 'Sick Leave';
}

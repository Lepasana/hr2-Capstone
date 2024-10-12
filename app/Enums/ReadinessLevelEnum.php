<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum ReadinessLevelEnum: string
{
    use EnumsWithOptions;

    case ONE_YEAR = 'Upcoming';
    case READY_NOW = 'Ready Now';
}

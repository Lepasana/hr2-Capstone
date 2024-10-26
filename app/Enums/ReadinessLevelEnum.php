<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum ReadinessLevelEnum: string
{
    use EnumsWithOptions;

    case IMMEDIATE = 'Immediate';
    case NEAR_TERM = 'Near-Term';
    case LONG_TERM = 'Long-Term';
}

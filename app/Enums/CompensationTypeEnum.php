<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum CompensationTypeEnum: string
{
    use EnumsWithOptions;

    case SALARIES = 'SALARIES';
}

<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum CompetencyStatusEnum: string
{
    use EnumsWithOptions;
    case ACTIVE = 'active';
    case NOT_ACTIVE = 'not active';
}

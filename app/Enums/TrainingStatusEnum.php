<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum TrainingStatusEnum: string
{
    use EnumsWithOptions;

    case UPCOMING = 'Upcoming';
    case ONGOING = 'On-Going';
    case COMPLETED = 'Completed';
}

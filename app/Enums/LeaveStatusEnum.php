<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum LeaveStatusEnum: string
{
    use EnumsWithOptions;

    case APPROVED = 'Approved';
    case PENDING = 'Pending';
    case DECLINED = 'Declined';
}

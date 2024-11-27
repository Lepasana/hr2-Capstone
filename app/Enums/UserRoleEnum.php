<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum UserRoleEnum: string
{
    use EnumsWithOptions;

    case SUPER_ADMIN = 'super_admin';
    case EMPLOYEE = 'employee';
}

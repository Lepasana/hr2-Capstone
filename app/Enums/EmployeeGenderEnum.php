<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum EmployeeGenderEnum: string
{
    use EnumsWithOptions;

    case MALE = "Male";
    case FEMALE = "Female";
}

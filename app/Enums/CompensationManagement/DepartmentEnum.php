<?php

namespace App\Enums\CompensationManagement;

use App\Traits\EnumsWithOptions;

enum DepartmentEnum: string
{
    use EnumsWithOptions;

    case HR = "HR";
    case LOGISTICS = "Logistics";
    case FINANCE = "Finance";
}

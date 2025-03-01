<?php

namespace App\Enums\SuccessionPlanning;

use App\Traits\EnumsWithOptions;

enum CurrentPositionEnum: string
{
    use EnumsWithOptions;

    case HR_STAFF = 'HR Staff';
    case SECURITY_AGENCY_MANAGER = 'Security Agency Manager';
    case LOGISTIC_STAFF = 'Logistic Staff';
    case FINANCE_STAFF = 'Finance Staff';
    case TRAINING_AND_DEVELOPMENT_SPECIALIST = 'Training and Development Specialist';
}

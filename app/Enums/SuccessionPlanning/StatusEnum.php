<?php
namespace App\Enums\SuccessionPlanning;

use App\Traits\EnumsWithOptions;

enum StatusEnum: string
{
    use EnumsWithOptions;

    case IN_PROGRESS = "In Progress";
    case READY_NOW = "Ready Now";
    case NOT_READY = "Not Ready";
}

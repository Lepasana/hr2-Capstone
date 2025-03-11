<?php

namespace App\Enums\LearningManagement;

use App\Traits\EnumsWithOptions;

enum ScoreStatus: string
{
    use EnumsWithOptions;

    case PASSED = "passed";
    case FAILED = "failed";
}

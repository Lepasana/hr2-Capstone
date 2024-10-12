<?php

namespace App\Enums;

use App\Traits\EnumsWithOptions;

enum SkillLevelEnum: string
{
    use EnumsWithOptions;

    case BEGINNER = 'Beginner';
    case ADVANCED = 'Advanced';
    case INTERMEDIATE = 'Intermediate';
    case EXPERT = 'Expert';
}

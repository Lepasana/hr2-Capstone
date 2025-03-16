<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'hourly_rate',
        'regular_ot_pay',
        'rest_day_ot_pay',
    ];
}

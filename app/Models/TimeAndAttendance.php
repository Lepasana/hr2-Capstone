<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeAndAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'time_in',
        'time_out',
        'total_hours_work',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

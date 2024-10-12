<?php

namespace App\Models;

use App\Models\Duration;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_name',
        'employee_id',
        'training_date',
        'duration_id',
        'status',
    ];

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

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
        'date_completed',
        'duration_id',
        'status',
    ];

    protected $casts = [
        'date_completed' => 'datetime'
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

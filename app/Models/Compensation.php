<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compensation extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'project_name',
        'compensation_type',
        'amount',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}

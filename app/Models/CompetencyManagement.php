<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\JobRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetencyManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'job_request_id',
        'competency',
        'department',
        'skill_level',
        'status',
        'notes',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function jobPosition(): BelongsTo
    {
      return $this->belongsTo(JobPosition::class, 'job_request_id');
    }
}

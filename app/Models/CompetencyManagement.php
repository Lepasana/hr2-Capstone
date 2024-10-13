<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetencyManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'competency',
        'skill_level',
        'proficiency',
        'notes',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

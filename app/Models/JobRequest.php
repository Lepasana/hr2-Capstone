<?php

namespace App\Models;

use App\Models\JobQualification;
use App\Models\CompetencyManagement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title'
    ];

    public function jobQualifications(): HasMany
    {
        return $this->hasMany(JobQualification::class);
    }

    public function competency(): HasMany
    {
      return $this->hasMany(CompetencyManagement::class);
    }
}

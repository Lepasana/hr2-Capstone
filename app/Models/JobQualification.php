<?php

namespace App\Models;

use App\Models\JobRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_request_id',
        'content'
    ];

    public function jobRequest(): BelongsTo
    {
        return $this->belongsTo(JobRequest::class);
    }
}

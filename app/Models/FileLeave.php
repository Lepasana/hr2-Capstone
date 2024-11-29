<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileLeave extends Model
{
  use HasFactory;

  protected $fillable = [
    'employee_id',
    'leave_type',
    'start_date',
    'end_date',
  ];

  protected $casts = [
    'start_date' => 'date',
    'end_date' => 'date',
  ];

  public function employee(): BelongsTo
  {
    return $this->belongsTo(Employee::class);
  }
}

<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeAndAttendance extends Model
{
  use HasFactory;

  protected $fillable = [
    'employee_id',
    'time_in',
    'time_out',
    'total_hours_work',
  ];

  // TODO
  protected static function booted()
  {
    static::addGlobalScope('user', function (Builder $builder) {
      if (auth()->check()) {
        $builder->where('employee_id', auth()->id());
      }
    });
  }

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }
}

<?php
namespace App\Models;

use App\Models\Duration;
use App\Models\Employee;
use Carbon\Carbon;
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
        'date_completed' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->date_completed = Carbon::parse($model->training_date)->addDays($model->duration?->title);
        });

        static::saving(function ($model) {
            $model->date_completed = Carbon::parse($model->training_date)->addDays($model->duration?->title);
        });

    }

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

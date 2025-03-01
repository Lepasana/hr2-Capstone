<?php

namespace App\Models;

use App\Models\TrainingManagement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public function trainings()
    {
        return $this->hasMany(TrainingManagement::class);
    }

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }
}

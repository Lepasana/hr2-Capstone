<?php

namespace App\Models;

use App\Models\TrainingManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function trainings()
    {
        return $this->hasMany(TrainingManagement::class);
    }
}

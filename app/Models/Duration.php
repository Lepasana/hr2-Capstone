<?php

namespace App\Models;

use App\Models\TrainingManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function trainings()
    {
        return $this->hasMany(TrainingManagement::class);
    }
}

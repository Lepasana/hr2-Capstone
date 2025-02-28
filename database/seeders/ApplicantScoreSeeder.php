<?php

namespace Database\Seeders;

use App\Models\ApplicantScore;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicantScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplicantScore::factory()->count(100)->create();
    }
}

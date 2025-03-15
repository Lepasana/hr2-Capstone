<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'title' => "HR Staff",
                'hourly_rate' => 83.33,
                'created_at' => now()
            ],
            [
                'title' => "Security Agency Manager",
                'hourly_rate' => 187.50,
                'created_at' => now()
            ],
            [
                'title' => "Logistic Staff",
                'hourly_rate' => 75,
                'created_at' => now()
            ],
            [
                'title' => "Finance Staff",
                'hourly_rate' => 104.17,
                'created_at' => now()
            ],
            [
                'title' => "Training and Development Specialist",
                'hourly_rate' => 104.17,
                'created_at' => now()
            ],
        ];

        foreach ($positions as $position) {
            DB::table('job_positions')->updateOrInsert(['title' => $position['title']], $position);
        }
    }
}

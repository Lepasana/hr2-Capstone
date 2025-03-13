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
                'created_at' => now()
            ],
            [
                'title' => "Security Agency Manager",
                'created_at' => now()
            ],
            [
                'title' => "Logistic Staff",
                'created_at' => now()
            ],
            [
                'title' => "Finance Staff",
                'created_at' => now()
            ],
            [
                'title' => "Training and Development Specialist",
                'created_at' => now()
            ],
        ];

        foreach ($positions as $position) {
            DB::table('job_positions')->updateOrInsert(['title' => $position['title']], $position);
        }
    }
}

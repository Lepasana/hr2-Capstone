<?php

namespace Database\Seeders;

use App\Models\JobRequest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // JobRequest::factory()->count(100)->create();
        $positions = [
            [
                'job_title' => "Manager",
                'created_at' => now()
            ],
            [
                'job_title' => "HR Staff",
                'created_at' => now()
            ],
            [
                'job_title' => "Logistic Staff",
                'created_at' => now()
            ],
            [
                'job_title' => "Finance Staff",
                'created_at' => now()
            ],
            [
                'job_title' => "Training and Development Specialist",
                'created_at' => now()
            ],
            [
                'job_title' => "Security",
                'created_at' => now()
            ],
        ];

        foreach ($positions as $position) {
            DB::table('job_requests')->updateOrInsert(['job_title' => $position['job_title']], $position);
        }
    }
}

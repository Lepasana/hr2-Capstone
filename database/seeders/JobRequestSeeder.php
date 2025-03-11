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
                'job_title' => "Manager"
            ],
            [
                'job_title' => "HR Staff"
            ],
            [
                'job_title' => "Logistic Staff"
            ],
            [
                'job_title' => "Finance Staff"
            ],
            [
                'job_title' => "Training and Development Specialist"
            ],
        ];

        foreach ($positions as $position) {
            DB::table('job_requests')->updateOrInsert(['job_title' => $position['job_title']], $position);
        }
    }
}

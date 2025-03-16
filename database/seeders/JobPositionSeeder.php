<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'title'           => "HR Assistant",
                'category'        => "HR Staff",
                'hourly_rate'     => 453,
                'regular_ot_pay'  => 150,
                'rest_day_ot_pay' => 200,
                'created_at'      => now(),
            ],
            [
                'title'           => "HR Specialist",
                'category'        => "HR Staff",
                'hourly_rate'     => 145.83,
                'regular_ot_pay'  => 180,
                'rest_day_ot_pay' => 230,
                'created_at'      => now(),
            ],
            [
                'title'           => "HR Coordinator",
                'category'        => "HR Staff",
                'hourly_rate'     => 187.50,
                'regular_ot_pay'  => 200,
                'rest_day_ot_pay' => 260,
                'created_at'      => now(),
            ],
            [
                'title'           => "HR Manager",
                'category'        => "HR Staff",
                'hourly_rate'     => 229.17,
                'regular_ot_pay'  => 250,
                'rest_day_ot_pay' => 320,
                'created_at'      => now(),
            ],
            [
                'title'           => "HR Director",
                'category'        => "HR Staff",
                'hourly_rate'     => 270.63,
                'regular_ot_pay'  => 300,
                'rest_day_ot_pay' => 380,
                'created_at'      => now(),
            ],
            [
                'title'           => "Security Guard",
                'category'        => "Security Agency",
                'hourly_rate'     => 93.75,
                'regular_ot_pay'  => 117,
                'rest_day_ot_pay' => 140,
                'created_at'      => now(),
            ],
            [
                'title'           => "Security Supervisor",
                'category'        => "Security Agency",
                'hourly_rate'     => 135.42,
                'regular_ot_pay'  => 170,
                'rest_day_ot_pay' => 210,
                'created_at'      => now(),
            ],
            [
                'title'           => "Security Operations Manager",
                'category'        => "Security Agency",
                'hourly_rate'     => 187.50,
                'regular_ot_pay'  => 235,
                'rest_day_ot_pay' => 290,
                'created_at'      => now(),
            ],
            [
                'title'           => "Risk Management Officer",
                'category'        => "Security Agency",
                'hourly_rate'     => 229.17,
                'regular_ot_pay'  => 285,
                'rest_day_ot_pay' => 360,
                'created_at'      => now(),
            ],
            [
                'title'           => "Chief Security Officer (CSO)",
                'category'        => "Security Agency",
                'hourly_rate'     => 270.83,
                'regular_ot_pay'  => 337,
                'rest_day_ot_pay' => 420,
                'created_at'      => now(),
            ],
            [
                'title'           => "Logistics Assistant",
                'category'        => "Logistic Staff",
                'hourly_rate'     => 93.75,
                'regular_ot_pay'  => 135,
                'rest_day_ot_pay' => 180,
                'created_at'      => now(),
            ],
            [
                'title'           => "Logistics Coordinator",
                'category'        => "Logistic Staff",
                'hourly_rate'     => 135.42,
                'regular_ot_pay'  => 160,
                'rest_day_ot_pay' => 210,
                'created_at'      => now(),
            ],
            [
                'title'           => "Supply Chain Analyst",
                'category'        => "Logistic Staff",
                'hourly_rate'     => 177.08,
                'regular_ot_pay'  => 190,
                'rest_day_ot_pay' => 250,
                'created_at'      => now(),
            ],
            [
                'title'           => "Warehouse Supervisor",
                'category'        => "Logistic Staff",
                'hourly_rate'     => 218.75,
                'regular_ot_pay'  => 230,
                'rest_day_ot_pay' => 290,
                'created_at'      => now(),
            ],
            [
                'title'           => "Logistics Manager",
                'category'        => "Logistic Staff",
                'hourly_rate'     => 270.83,
                'regular_ot_pay'  => 280,
                'rest_day_ot_pay' => 350,
                'created_at'      => now(),
            ],
            [
                'title'           => "Financial Analyst",
                'category'        => "Finance Staff",
                'hourly_rate'     => 156.25,
                'regular_ot_pay'  => 195,
                'rest_day_ot_pay' => 250,
                'created_at'      => now(),
            ],
            [
                'title'           => "Financial Manager",
                'category'        => "Finance Staff",
                'hourly_rate'     => 208.33,
                'regular_ot_pay'  => 260,
                'rest_day_ot_pay' => 320,
                'created_at'      => now(),
            ],
            [
                'title'           => "Accountant",
                'category'        => "Finance Staff",
                'hourly_rate'     => 182.29,
                'regular_ot_pay'  => 230,
                'rest_day_ot_pay' => 290,
                'created_at'      => now(),
            ],
            [
                'title'           => "Payroll Specialist",
                'category'        => "Finance Staff",
                'hourly_rate'     => 197.92,
                'regular_ot_pay'  => 240,
                'rest_day_ot_pay' => 300,
                'created_at'      => now(),
            ],
            [
                'title'           => "Chief Financial Officer (CFO)",
                'category'        => "Finance Staff",
                'hourly_rate'     => 364.58,
                'regular_ot_pay'  => 440,
                'rest_day_ot_pay' => 550,
                'created_at'      => now(),
            ],
            [
                'title'           => "Training Specialist",
                'category'        => "Training Staff",
                'hourly_rate'     => 145.83,
                'regular_ot_pay'  => 182,
                'rest_day_ot_pay' => 219,
                'created_at'      => now(),
            ],
            [
                'title'           => "Training Coordinator",
                'category'        => "Training Staff",
                'hourly_rate'     => 156.25,
                'regular_ot_pay'  => 195,
                'rest_day_ot_pay' => 235,
                'created_at'      => now(),
            ],
            [
                'title'           => "Corporate Trainer",
                'category'        => "Training Staff",
                'hourly_rate'     => 177.08,
                'regular_ot_pay'  => 222,
                'rest_day_ot_pay' => 266,
                'created_at'      => now(),
            ],
            [
                'title'           => "Learning & Development Specialist",
                'category'        => "Training Staff",
                'hourly_rate'     => 197.92,
                'regular_ot_pay'  => 247,
                'rest_day_ot_pay' => 297,
                'created_at'      => now(),
            ],
            [
                'title'           => "Instructional Designer",
                'category'        => "Training Staff",
                'hourly_rate'     => 218.75,
                'regular_ot_pay'  => 273,
                'rest_day_ot_pay' => 328,
                'created_at'      => now(),
            ],
            [
                'title'           => "Traininer Manager",
                'category'        => "Training Staff",
                'hourly_rate'     => 270.83,
                'regular_ot_pay'  => 338,
                'rest_day_ot_pay' => 405,
                'created_at'      => now(),
            ],
        ];

        foreach ($positions as $position) {
            DB::table('job_positions')->updateOrInsert(['title' => $position['title']], $position);
        }
    }
}

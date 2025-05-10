<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ApplicantScoreSeeder;
use Database\Seeders\ApplicantSeeder;
use Database\Seeders\CompensationPlanSeeder;
use Database\Seeders\DurationSeeder;
use Database\Seeders\ExaminationSeeder;
use Database\Seeders\JobPositionSeeder;
use Database\Seeders\JobRequestSeeder;
use Database\Seeders\PerformanceSeeder;
use Database\Seeders\TimesheetSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JobPositionSeeder::class,
            UserSeeder::class,
            DurationSeeder::class,
            JobRequestSeeder::class,
            //   TrainingSeeder::class,
            ApplicantSeeder::class,
            ExaminationSeeder::class,
            ApplicantScoreSeeder::class,
            TimesheetSeeder::class,
            CompensationPlanSeeder::class,
            PerformanceSeeder::class,
            MemoSeeder::class,
        ]);

    }
}

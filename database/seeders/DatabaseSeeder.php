<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DurationSeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\TrainingSeeder;
use Database\Seeders\ApplicantSeeder;
use Database\Seeders\TimesheetSeeder;
use Database\Seeders\JobRequestSeeder;
use Database\Seeders\ExaminationSeeder;
use Database\Seeders\ApplicantScoreSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      UserSeeder::class,
      DurationSeeder::class,
      // EmployeeSeeder::class,
      JobRequestSeeder::class,
      TrainingSeeder::class,
      ApplicantSeeder::class,
      ExaminationSeeder::class,
      ApplicantScoreSeeder::class,
      TimesheetSeeder::class,
    ]);

  }
}

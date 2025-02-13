<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DurationSeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\JobRequestSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      DurationSeeder::class,
      EmployeeSeeder::class,
      UserSeeder::class,
      JobRequestSeeder::class,
    ]);

  }
}

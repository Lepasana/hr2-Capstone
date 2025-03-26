<?php

namespace Database\Seeders;

use App\Models\Performance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Performance::factory()->count(10)->create();
    }
}

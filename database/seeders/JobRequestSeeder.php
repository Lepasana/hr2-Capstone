<?php

namespace Database\Seeders;

use App\Models\JobRequest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobRequest::factory()->count(10)->create();
    }
}

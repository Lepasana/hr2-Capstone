<?php
namespace Database\Seeders;

use App\Models\TrainingManagement;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingManagement::factory()->count(100)->create();
    }
}

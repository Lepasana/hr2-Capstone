<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $durations = [
            [
                'title' => 1,
            ],
            [
                'title' => 2,
            ],
            [
                'title' => 3,
            ],
            [
                'title' => 4,
            ],
            [
                'title' => 5,
            ],
            [
                'title' => 6,
            ],
            [
                'title' => 7,
            ],
        ];

        foreach ($durations as $duration) {
            DB::table('durations')->updateOrInsert(['title' => $duration['title']], $duration);
        }
    }
}

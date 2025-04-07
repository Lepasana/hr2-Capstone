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
            [
                'title' => 8,
            ],
            [
                'title' => 9,
            ],
            [
                'title' => 10,
            ],
            [
                'title' => 11,
            ],
            [
                'title' => 12
            ],
            [
                'title' => 13,
            ],
            [
                'title' => 14,
            ],
            [
                'title' => 15,
            ],
            [
                'title' => 16,
            ],
            [
                'title' => 17,
            ],
            [
                'title' => 18,
            ],
            [
                'title' => 19,
            ],
            [
                'title' => 20,
            ],
            [
                'title' => 21,
            ],
            [
                'title' => 22,
            ],
            [
                'title' => 23,
            ],
            [
                'title' => 24,
            ],
            [
                'title' => 25,
            ],
            [
                'title' => 26,
            ],
            [
                'title' => 27,
            ],
            [
                'title' => 28,
            ],
            [
                'title' => 29,
            ],
            [
                'title' => 30,
            ],
        ];

        foreach ($durations as $duration) {
            DB::table('durations')->updateOrInsert(['title' => $duration['title']], $duration);
        }
    }
}

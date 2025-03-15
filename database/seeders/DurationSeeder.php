<?php
namespace Database\Seeders;

use App\Models\Duration;
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
                'title' => "1 Day"
            ],
            [
                'title' => "2 Days"
            ],
            [
                'title' => "3 Days"
            ],
            [
                'title' => "4 Days"
            ],
            [
                'title' => "5 Days"
            ],
            [
                'title' => "6 Days"
            ],
            [
                'title' => "7 Days"
            ],
        ];

        foreach ($durations as $duration) {
            DB::table('durations')->updateOrInsert(['title' => $duration['title']], $duration);
        }
    }
}

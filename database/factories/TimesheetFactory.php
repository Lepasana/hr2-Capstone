<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timesheet>
 */
class TimesheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       // Generate random time_in between 6:00 AM and 9:30 AM
       $timeIn = Carbon::today()->setHour(fake()->numberBetween(6, 9))->setMinute(fake()->numberBetween(0, 30))->setSecond(0);

       // Generate random time_out before or at 5:00 PM
       $timeOut = Carbon::today()->setHour(fake()->numberBetween(14, 17))->setMinute(fake()->numberBetween(0, 59))->setSecond(0);

       // Calculate total hours worked
       $totalHoursWork = $timeIn->diffInHours($timeOut);
        return [
            'employee_id' => Employee::query()->inRandomOrder()->value('id'),
            'date' => fake()->dateTimeBetween('2024-12-15', '2025-03-31'),
            'time_in' => $timeIn, // random time here H:m:s
            'time_out' => $timeOut, // random time here H:m:s,
            'total_hours_work' => $totalHoursWork, // count the total time
            'number_of_absent' => fake()->numberBetween(0, 0)
        ];
    }
}

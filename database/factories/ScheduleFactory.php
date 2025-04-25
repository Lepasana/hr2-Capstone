<?php
namespace Database\Factories;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shiftType = fake()->randomElement(['Morning Shift', 'Night Shift']);

        if ($shiftType === 'Morning Shift') {
            $timeIn  = Carbon::today()->setHour(8)->setMinute(0)->setSecond(0);
            $timeOut = Carbon::today()->setHour(17)->setMinute(0)->setSecond(0);
        } else {
            // Night Shift example: 9 PM to 6 AM the next day
            $timeIn  = Carbon::today()->setHour(21)->setMinute(0)->setSecond(0);
            $timeOut = Carbon::tomorrow()->setHour(6)->setMinute(0)->setSecond(0);
        }

        return [
            'employee_id' => Employee::query()->inRandomOrder()->value('id'),
            'date'        => fake()->dateTimeBetween('2024-12-15', '2025-03-31'),
            'time_from'   => $timeIn,
            'time_to'     => $timeOut,
            'shift_type'  => $shiftType,
        ];
    }
}

<?php
namespace Database\Factories;

use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performance>
 */
class PerformanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $employee = 1;
        static $jobPosition = 1;

        return [
            'employee_id'        => $employee++,
            'job_position_id'    => $jobPosition++,
            'department'         => fake()->randomElement(['HR', 'Logistics', 'Finance', 'Training', 'Security']),
            'total_hours_work'   => fake()->numberBetween(0, 100),
            'performance_review' => fake()->randomElement(['Unsatisfactory', 'Needs Improvement', 'Meets Expectations', 'Exceeds Expectations', 'Outstanding']),
            'last_review_date'   => fake()->dateTimeBetween('2022-11-30', '2025-02-30'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Duration;
use App\Models\Employee;
use App\Enums\TrainingStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TrainingManagementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'training_name' => fake()->jobTitle(),
            'employee_id' => Employee::factory()->create()->id,
            'training_date' => fake()->dateTimeBetween('2024-12-15', '2025-01-15'),
            'duration_id' => Duration::factory()->create()->id,
            'status' => TrainingStatusEnum::UPCOMING->value,
            'created_at' => fake()->dateTimeBetween('2024-11-30' ,'2025-02-30'), // Random date between February 2025 and November 2025
        ];
    }
}

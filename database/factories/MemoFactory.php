<?php
namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Memo>
 */
class MemoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::query()->inRandomOrder()->value('id'),
            'from' => fake()->name(),
            'to' => fake()->name(),
            'subject' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'date' => fake()->dateTimeBetween('2024-11-30' ,'2025-02-30'),
        ];
    }
}

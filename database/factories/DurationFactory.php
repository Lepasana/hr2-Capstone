<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Duration>
 */
class DurationFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $days = $this->faker->numberBetween(1, 10);

    return [
      'title' => $days . ' Day' . ($days > 1 ? 's' : ''), // Output format "1 day" or "2 days"
    ];
  }
}

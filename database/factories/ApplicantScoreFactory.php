<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Examination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantScore>
 */
class ApplicantScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'applicant_id' => Applicant::factory()->create()->id,
            'examination_id' => Examination::factory()->create()->id,
            'score' => fake()->numberBetween(0, 100)
        ];
    }
}

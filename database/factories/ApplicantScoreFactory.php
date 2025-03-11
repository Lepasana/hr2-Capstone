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
            'applicant_id' => Applicant::query()->inRandomOrder()->value('id'),
            'examination_id' => Examination::query()->inRandomOrder()->value('id'),
            'score' => $score = fake()->numberBetween(0, 100),
            'status' => $score < 25 ? 'failed' : 'passed',
            'duration' => fake()->numberBetween(1, 180) . ' minutes', // Duration in minutes
        ];
    }
}

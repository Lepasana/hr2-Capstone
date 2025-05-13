<?php
namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Employee;
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
        $assignToEmployee = fake()->boolean();

        $employeeId = $assignToEmployee
            ? Employee::query()->inRandomOrder()->value('id')
            : null;

        $applicantId = ! $assignToEmployee
            ? Applicant::query()->inRandomOrder()->value('id')
            : null;

        return [
            'applicant_id'   => $applicantId,
            'employee_id'    => $employeeId,
            'examination_id' => Examination::query()->inRandomOrder()->value('id'),
            'score'          => $score = fake()->numberBetween(0, 100),
            'status'         => $score < 25 ? 'failed' : 'passed',
            'duration'       => fake()->numberBetween(1, 180) . ' minutes',
        ];
    }
}

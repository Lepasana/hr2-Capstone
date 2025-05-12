<?php
namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Employee;
use App\Models\JobPosition;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Rogem Lepasana',
                'email'    => 'rogemlepasana@gmail.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::HR2_ADMIN->value,
            ],
            [
                'name'     => 'Test Account',
                'email'    => 'test@gmail.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::HR2_ADMIN->value,
            ],
            [
                'name'     => 'HR2 Admin',
                'email'    => 'hr2-admin@gmail.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::HR2_ADMIN->value,
            ],
            [
                'name'     => 'HR4 Admin',
                'email'    => 'hr4-admin@gmail.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::SUPER_ADMIN->value,
            ],
            [
                'name'     => 'Enrique Ramos',
                'email'    => 'enrique.ramos@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Cecilia Dela Pena',
                'email'    => 'cecilia.delapena@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Mark Villanueva',
                'email'    => 'mark.villanueva@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Adrian Mendoza',
                'email'    => 'adrian.mendoza@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Paul Hernandez',
                'email'    => 'paul.hernandez@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Angela Pascual',
                'email'    => 'angela.pascual@email.com	',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Luis Santos',
                'email'    => 'luis.santos@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Veronica Tan',
                'email'    => 'veronica.tan@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Melissa Diaz',
                'email'    => 'melissa.diaz@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Henry Cruz',
                'email'    => 'henry.cruz@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Arlene Valdez',
                'email'    => 'arlene.valdez@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Roberto Villamor',
                'email'    => 'roberto.villamor@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Susan Bautista',
                'email'    => 'susan.bautista@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Vincent Navarro',
                'email'    => 'vincent.navarro@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Christine Ramos',
                'email'    => 'christine.ramos@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Edgar Bautista',
                'email'    => 'edgar.bautista@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Sheila Cruz',
                'email'    => 'sheila.cruz@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Albert Martinez',
                'email'    => 'albert.martinez@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],

            [
                'name'     => 'Angela Castillo',
                'email'    => 'angela.castillo@email.com',
                'password' => Hash::make('password'),
                'role'     => UserRoleEnum::EMPLOYEE->value,
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::updateOrCreate(['email' => $user['email']], $user);

            if ($newUser && $newUser['role'] == UserRoleEnum::EMPLOYEE->value) {
                $jobPosition = JobPosition::query()->inRandomOrder()->first();
                $prefix      = '';

                if ($jobPosition) {
                    $prefix = match (strtolower($jobPosition->category)) {
                        'hr staff' => 'H',
                        'security agency' => 'S',
                        'logistic staff' => 'L',
                        'finance staff' => 'F',
                        'training staff' => 'T',
                        default => 'X', // Default if category is not recognized
                    };

                    $skillsList = [
                        ['title' => 'Communication'],
                        ['title' => 'Teamwork'],
                        ['title' => 'Problem-solving'],
                        ['title' => 'Time Management'],
                        ['title' => 'Adaptability'],
                        ['title' => 'Critical Thinking'],
                        ['title' => 'Leadership'],
                        ['title' => 'Creativity'],
                        ['title' => 'Work Ethic'],
                        ['title' => 'Emotional Intelligence'],
                        ['title' => 'Conflict Resolution'],
                        ['title' => 'Decision Making'],
                        ['title' => 'Stress Management'],
                        ['title' => 'Collaboration'],
                        ['title' => 'Attention to Detail'],
                    ];

                    // Count employees with the same prefix to reset numbering per position
                    $count   = Employee::where('employee_code', 'like', "$prefix%")->count() + 1;
                    $newUser = DB::table('employees')->updateOrInsert(['email' => $newUser->email], [
                        'user_id'         => $newUser->id,
                        'name'            => $user['name'],
                        'job_position_id' => $jobPosition->id,
                        'employee_code'   => $prefix . str_pad($count, 3, '0', STR_PAD_LEFT),
                        'gender'          => fake()->randomElement(['Male', 'Female']),
                        'civil_status'    => fake()->randomElement(['Single', 'Married', 'Divorced']),
                        'age'             => fake()->numberBetween(18, 60),
                        'email'           => $newUser->email,
                        'present_address' => fake()->address(),
                        'department'      => fake()->randomElement(['HR', 'Logistics', 'Finance', 'Training', 'Security']),
                        'employment_type' => fake()->randomElement(['Full Time', 'Part Time']),
                        'date_hired'      => fake()->dateTimeBetween('2022-11-30', '2025-02-30'),
                        'status'          => fake()->randomElement(['Active', 'On-leave', 'Terminated']),
                        'skills'          => json_encode(collect(fake()->randomElements($skillsList, rand(3, 5)))->values()->all()),
                    ]);
                }
            }
        }
    }
}

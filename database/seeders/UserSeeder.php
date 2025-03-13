<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Enums\UserRoleEnum;
use App\Models\JobPosition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Rogem Lepasana',
                'email' => 'rogemlepasana@gmail.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::SUPER_ADMIN->value,
            ],
            [
                'name' => 'Test Account',
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::SUPER_ADMIN->value,
            ],
            [
                'name' => 'HR2 Admin',
                'email' => 'hr2-admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::SUPER_ADMIN->value,
            ],
            [
                'name' => 'HR4 Admin',
                'email' => 'hr4-admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::SUPER_ADMIN->value,
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'David Martinez',
                'email' => 'david.martinez@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Sarah Brown',
                'email' => 'sarah.brown@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Robert Wilson',
                'email' => 'robert.wilson@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Laura Anderson',
                'email' => 'laura.anderson@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Daniel Thomas',
                'email' => 'daniel.thomas@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
            [
                'name' => 'Olivia Harris',
                'email' => 'olivia.harris@example.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::updateOrCreate(['email' => $user['email']], $user);

            if ($newUser && $newUser['role'] == UserRoleEnum::EMPLOYEE->value) {
                static $counter = 1;

                $employee = new Employee;
                $employee->user_id = $newUser->id;
                $employee->name = $user['name'];
                $employee->employee_code = 'H' . str_pad($counter++, 3, '0', STR_PAD_LEFT);
                $employee->gender = fake()->randomElement(['Male', 'Female', 'Other']);
                $employee->job_position_id = JobPosition::query()->inRandomOrder()->value('id');
                $employee->department = fake()->randomElement(['HR', 'Logistics', 'Finance']);
                $employee->employment_type = fake()->randomElement(['Full Time', 'Part Time']);
                $employee->date_hired = fake()->dateTimeBetween('2022-11-30', '2025-02-30');
                $employee->status = fake()->randomElement(['Active', 'On-leave', 'Terminated']);
                $employee->save();
            }
        }
    }
}

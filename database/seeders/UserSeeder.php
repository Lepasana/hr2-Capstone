<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Enums\UserRoleEnum;
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
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('password'),
                'role' => UserRoleEnum::EMPLOYEE->value,
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::updateOrCreate(['email' => $user['email']], $user);

            if ($newUser) {
                $employee = new Employee;
                $employee->user_id = $newUser->id;
                $employee->name = $user['name'];
                $employee->save();
            }
        }
    }
}

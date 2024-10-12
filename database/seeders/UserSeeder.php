<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
    ];

    foreach ($users as $user) {
      User::updateOrCreate(['email' => $user['email']], $user);
    }
  }
}

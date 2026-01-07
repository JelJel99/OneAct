<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User::truncate();
        User::query()->delete();

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@oneact.id',
            'password' => Hash::make('admin123456'),
            'role' => 'admin',
            'status' => 'active',
            // 'program_history' => null,
        ]);

        User::create([
            'name' => 'Dummy User',
            'email' => 'dummy@gmail.com',
            'password' => Hash::make('dummy123456'),
            'role' => 'general',
            'status' => 'active',
            // 'program_history' => null,
        ]);

        User::create([
            'name' => 'aa User',
            'email' => 'aa@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'general',
            'status' => 'active',
            // 'program_history' => null,
        ]);

        User::create([
            'name' => 'bb User',
            'email' => 'bb@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'general',
            'status' => 'active',
            // 'program_history' => null,
        ]);
    }
}

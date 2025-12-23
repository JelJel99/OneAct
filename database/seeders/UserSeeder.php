<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'active'
        ]);

        User::create([
            'name' => 'Relawan Andi',
            'email' => 'andi@oneact.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'status' => 'active'
        ]);

        User::create([
            'name' => 'Relawan Citra',
            'email' => 'citra@oneact.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
            'status' => 'active'
        ]);
    }
}

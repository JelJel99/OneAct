<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramProposalSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@oneact.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Relawan Andi',
            'email' => 'andi@oneact.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
        ]);

        User::create([
            'name' => 'Relawan Citra',
            'email' => 'citra@oneact.id',
            'password' => Hash::make('password'),
            'role' => 'relawan',
        ]);
    }
}

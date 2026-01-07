<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RelawanDaftar;

class RelawanDaftarSeeder extends Seeder
{
    public function run(): void
    {
        RelawanDaftar::insert([
            [
                'user_id' => 2,
                'programrelawan_id' => 1,
                // 'status' => 'Selesai',
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
            [
                'user_id' => 2,
                'programrelawan_id' => 3,
                // 'status' => 'Dalam Pelaksanaan',
                'created_at' => now()->subWeeks(2),
                'updated_at' => now()->subWeeks(2),
            ],
        ]);
    }
}
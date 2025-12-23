<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        // dd('PROGRAM SEEDER JALAN');
        Program::create([
            [
                'organisasi_id' => 1,
                'judul' => 'Relawan Hijau',
                'type' => 'Relawan',
                'status' => 'pending',
                'created_at' => now()
                // 'updated_at' => now()
            ],
            [
                'organisasi_id' => 2,
                'judul' => 'Relawan Cerdas',
                'type' => 'Donasi',
                'status' => 'approved',
                'created_at' => now()
                // 'updated_at' => now()
            ],
            [
                'organisasi_id' => 3,
                'judul' => 'Relawan Cerdas - Jakarta Barat',
                'type' => 'Relawan',
                'status' => 'pending',
                'created_at' => now()
                // 'updated_at' => now()
            ],
            [
                'organisasi_id' => 4,
                'judul' => 'Donasi Panti Jompo',
                'type' => 'Donasi',
                'status' => 'rejected',
                'created_at' => now()
                // 'updated_at' => now()
            ]
            // lanjutkan sampai Energi Bersih
        ]);
    }
}

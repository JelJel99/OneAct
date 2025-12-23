<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramRelawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramRelawan::create([
            [
                'program_id' => 1,
                'kategori' => 'Lingkungan',
                'tenggat' => '2025-12-31',
                'deskripsi' => 'Bersama Relawan Hijau, kita bergerak menjaga keseimbangan alam...',
                'lokasi' => 'Indonesia',
                'komitmen' => 'Fleksibel',
                'keahlian' => 'Peduli Lingkungan',
                'foto' => 'assets/relawan/relawanhijau.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_id' => 2,
                'kategori' => 'Pendidikan',
                'tenggat' => '2025-12-31',
                'deskripsi' => 'Relawan Cerdas berfokus pada pendidikan...',
                'lokasi' => 'Indonesia',
                'komitmen' => 'Fleksibel',
                'keahlian' => 'Pendidikan',
                'foto' => 'assets/relawan/relawancerdas.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // lanjutkan sampai Energi Bersih
        ]);
    }
}

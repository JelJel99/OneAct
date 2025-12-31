<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProgramRelawan;

class ProgramRelawanSeeder extends Seeder
{
    public function run(): void
    {
        ProgramRelawan::create([
            'program_id' => 1,
            'kategori' => 'Sosial',
            'deskripsi' => 'Relawan membantu distribusi makanan dan pendampingan lansia terlantar.',
            'lokasi' => 'Jakarta',
            'komitmen' => 'Mingguan',
            'keahlian' => 'Empati & Sosial',
            'foto' => 'assets/relawan/lansia.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 5,
            'kategori' => 'Pendidikan',
            'deskripsi' => 'Relawan mendampingi anak-anak dalam kegiatan belajar dan literasi.',
            'lokasi' => 'Bandung',
            'komitmen' => 'Fleksibel',
            'keahlian' => 'Mengajar',
            'foto' => 'assets/relawan/pendidikan.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 7,
            'kategori' => 'Kesehatan',
            'deskripsi' => 'Relawan membantu edukasi kesehatan dan pemeriksaan dasar masyarakat.',
            'lokasi' => 'Surabaya',
            'komitmen' => 'Mingguan',
            'keahlian' => 'Kesehatan / Medis',
            'foto' => 'assets/relawan/kesehatan.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 9,
            'kategori' => 'Lingkungan',
            'deskripsi' => 'Relawan membersihkan lingkungan dan mengedukasi pengelolaan sampah.',
            'lokasi' => 'Bali',
            'komitmen' => 'Bulanan',
            'keahlian' => 'Peduli Lingkungan',
            'foto' => 'assets/relawan/lingkungan.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
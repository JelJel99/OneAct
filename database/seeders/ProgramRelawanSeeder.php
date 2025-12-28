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
            'kategori' => 'Lingkungan',
            'deskripsi' => 'Bersama Relawan Hijau, kita bergerak menjaga keseimbangan alam dan pelestarian hutan.',
            'lokasi' => 'Indonesia',
            'komitmen' => 'Fleksibel',
            'keahlian' => 'Peduli Lingkungan',
            'foto' => 'assets/relawan/relawanhijau.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 2,
            'kategori' => 'Pendidikan',
            'deskripsi' => 'Relawan Cerdas berfokus pada pendidikan anak-anak kurang mampu di berbagai daerah.',
            'lokasi' => 'Indonesia',
            'komitmen' => 'Fleksibel',
            'keahlian' => 'Pendidikan',
            'foto' => 'assets/relawan/relawancerdas.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 3,
            'kategori' => 'Kesehatan',
            'deskripsi' => 'Relawan Sehat membantu mengadakan pemeriksaan kesehatan gratis untuk masyarakat.',
            'lokasi' => 'Jakarta',
            'komitmen' => 'Mingguan',
            'keahlian' => 'Medis',
            'foto' => 'assets/relawan/relawansehat.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 4,
            'kategori' => 'Sosial',
            'deskripsi' => 'Relawan Peduli Sosial mendukung kegiatan pemberdayaan masyarakat dan bantuan sosial.',
            'lokasi' => 'Bandung',
            'komitmen' => 'Fleksibel',
            'keahlian' => 'Sosial',
            'foto' => 'assets/relawan/relawanpeduli.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 5,
            'kategori' => 'Bencana',
            'deskripsi' => 'Relawan Siaga Bencana membantu evakuasi dan pendistribusian bantuan saat bencana.',
            'lokasi' => 'Sulawesi',
            'komitmen' => 'Darurat',
            'keahlian' => 'Manajemen Bencana',
            'foto' => 'assets/relawan/relawansiaga.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 6,
            'kategori' => 'Kesenian',
            'deskripsi' => 'Relawan Seni berbagi keterampilan seni dan budaya kepada anak muda.',
            'lokasi' => 'Yogyakarta',
            'komitmen' => 'Bulanan',
            'keahlian' => 'Seni dan Budaya',
            'foto' => 'assets/relawan/relawansenibudaya.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 7,
            'kategori' => 'Teknologi',
            'deskripsi' => 'Relawan Teknologi mendukung literasi digital dan pengembangan IT untuk masyarakat.',
            'lokasi' => 'Surabaya',
            'komitmen' => 'Fleksibel',
            'keahlian' => 'Teknologi Informasi',
            'foto' => 'assets/relawan/relawanteknologi.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 8,
            'kategori' => 'Pemberdayaan Ekonomi',
            'deskripsi' => 'Relawan Mandiri membantu pelatihan kewirausahaan dan ekonomi kreatif.',
            'lokasi' => 'Medan',
            'komitmen' => 'Mingguan',
            'keahlian' => 'Ekonomi dan Kewirausahaan',
            'foto' => 'assets/relawan/relawanmandiri.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 9,
            'kategori' => 'Olahraga',
            'deskripsi' => 'Relawan Olahraga memfasilitasi kegiatan olahraga untuk anak-anak dan remaja.',
            'lokasi' => 'Bali',
            'komitmen' => 'Mingguan',
            'keahlian' => 'Olahraga',
            'foto' => 'assets/relawan/relawanolahraga.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 10,
            'kategori' => 'Lingkungan',
            'deskripsi' => 'Relawan Laut berfokus pada pelestarian dan kebersihan pantai serta laut.',
            'lokasi' => 'Lombok',
            'komitmen' => 'Fleksibel',
            'keahlian' => 'Konservasi Laut',
            'foto' => 'assets/relawan/relawanlaut.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
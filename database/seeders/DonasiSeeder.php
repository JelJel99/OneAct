<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donasi;

class DonasiSeeder extends Seeder
{
    public function run(): void
    {
        Donasi::create([
            'program_id' => 1,
            'deskripsi' => 'Program pemberian makanan bergizi untuk 500 lansia terlantar di Jakarta, Bandung, dan Surabaya.',
            'foto' => 'program-makan-bergizi-gratis.jpg',
            'target' => 21000000,
            'jumlahsaatini' => 10500000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 2,
            'deskripsi' => 'Bantuan terhadap korban banjir di Sumatra, dana yang terkumpul akan dibelikan kebutuhan pokok',
            'foto' => 'program-sembako-panti.jpg',
            'target' => 10000000,
            'jumlahsaatini' => 1500000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 3,
            'deskripsi' => 'Membantu anak-anak sekolah SDN 101 Serang, agar kembali nyaman belajar di sekolah mereka.',
            'foto' => 'program-buku-perpustakaan.jpg',
            'target' => 12000000,
            'jumlahsaatini' => 8000000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 4,
            'deskripsi' => 'Renovasi fasilitas belajar di sekolah dasar.',
            'foto' => 'program-renovasi-sekolah.jpg',
            'target' => 30000000,
            'jumlahsaatini' => 29000000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 5,
            'deskripsi' => 'Pengadaan alat kesehatan untuk klinik desa.',
            'foto' => 'program-alat-kesehatan.jpg',
            'target' => 25000000,
            'jumlahsaatini' => 15000000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 6,
            'deskripsi' => 'Bantuan pendidikan untuk anak kurang mampu.',
            'foto' => 'program-pendidikan-anak.jpg',
            'target' => 18000000,
            'jumlahsaatini' => 5000000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 7,
            'deskripsi' => 'Pembangunan sarana air bersih di desa.',
            'foto' => 'program-air-bersih.jpg',
            'target' => 15000000,
            'jumlahsaatini' => 15000000,
            'laporan' => 'laporan_air_bersih.pdf'
        ]);

        Donasi::create([
            'program_id' => 8,
            'deskripsi' => 'Pemberian pakaian layak untuk anak jalanan.',
            'foto' => 'program-pakaian-anak.jpg',
            'target' => 7000000,
            'jumlahsaatini' => 4000000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 9,
            'deskripsi' => 'Bantuan dana untuk korban bencana alam.',
            'foto' => 'program-bencana-alam.jpg',
            'target' => 35000000,
            'jumlahsaatini' => 10000000,
            'laporan' => null
        ]);

        Donasi::create([
            'program_id' => 10,
            'deskripsi' => 'Penyediaan alat tulis untuk sekolah di daerah terpencil.',
            'foto' => 'program-alat-tulis.jpg',
            'target' => 9000000,
            'jumlahsaatini' => 2500000,
            'laporan' => null
        ]);
    }
}
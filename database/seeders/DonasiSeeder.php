<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donation;

class DonasiSeeder extends Seeder
{
    public function run(): void
    {
        Donation::create([
            'program_id' => 2,
            'deskripsi' => 'Bantuan untuk korban banjir di Sumatra berupa kebutuhan pokok dan logistik darurat.',
            'foto' => 'assets/donasi/banjir_sumatra.jpg',
            'target' => 10000000,
            'jumlahsaatini' => 1500000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 3,
            'deskripsi' => 'Penggalangan dana untuk perbaikan fasilitas sekolah dan sarana belajar.',
            'foto' => 'assets/donasi/perbaikan_sekolah.jpg',
            'target' => 12000000,
            'jumlahsaatini' => 8000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 4,
            'deskripsi' => 'Donasi sembako dan kebutuhan medis untuk lansia di Panti Jompo Tiara Kasih.',
            'foto' => 'assets/donasi/panti_jompo.jpg',
            'target' => 30000000,
            'jumlahsaatini' => 29000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 6,
            'deskripsi' => 'Pengadaan buku pelajaran dan perlengkapan sekolah bagi siswa kurang mampu.',
            'foto' => 'assets/donasi/buku_sekolah.jpg',
            'target' => 18000000,
            'jumlahsaatini' => 5000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 8,
            'deskripsi' => 'Donasi pangan darurat untuk masyarakat terdampak krisis dan bencana.',
            'foto' => 'assets/donasi/pangan_darurat.jpg',
            'target' => 7000000,
            'jumlahsaatini' => 4000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 10,
            'deskripsi' => 'Penggalangan dana untuk pengadaan perlengkapan medis di daerah terpencil.',
            'foto' => 'assets/donasi/perlengkapan_medis.jpg',
            'target' => 9000000,
            'jumlahsaatini' => 2500000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 11,  // Donasi Bantuan Bencana Alam
            'deskripsi' => 'Bantuan untuk korban bencana alam berupa kebutuhan pokok dan logistik darurat.',
            'foto' => 'assets/donasi/bantuan_bencana_alam.jpg',
            'target' => 20000000,
            'jumlahsaatini' => 5000000,
            'laporan' => '/asset/pdf/laporan1.pdf',
            'laporan_uploaded_at' => '2025-12-30 14:30:00',
        ]);

        Donation::create([
            'program_id' => 12, // Donasi Pendidikan Anak Yatim
            'deskripsi' => 'Donasi untuk mendukung pendidikan anak yatim melalui penyediaan buku dan perlengkapan sekolah.',
            'foto' => 'assets/donasi/pendidikan_anak_yatim.jpg',
            'target' => 15000000,
            'jumlahsaatini' => 3500000,
            'laporan' => '/asset/pdf/laporan2.pdf',
            'laporan_uploaded_at' => '2025-12-30 11:30:00',
        ]);

        Donation::create([
            'program_id' => 13, // Donasi Pengobatan Pasien Kurang Mampu
            'deskripsi' => 'Bantuan biaya pengobatan untuk pasien kurang mampu di daerah terpencil.',
            'foto' => 'assets/donasi/pengobatan_pasien.jpg',
            'target' => 10000000,
            'jumlahsaatini' => 2500000,
            'laporan' => '/asset/pdf/laporan3.pdf',
            'laporan_uploaded_at' => '2025-12-30 19:30:00',
        ]);

        Donation::create([
            'program_id' => 17, // langsung pakai id program hasil create di atas
            'deskripsi' => 'Pengumpulan biaya untuk anak-anak Yatin desa Peras',
            'foto' => 'assets/donasi/buku_sekolah.jpg',
            'target' => 18000000,
            'jumlahsaatini' => 5000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

    }
}
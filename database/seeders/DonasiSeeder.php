<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donation;
use App\Models\Program;

class DonasiSeeder extends Seeder
{
    public function run(): void
    {
        Donation::create([
            'program_id' => 2,
            'deskripsi' => 'Bantuan untuk korban banjir di Sumatra berupa kebutuhan pokok dan logistik darurat.',
            'foto' => '/asset/donasi/antarafoto-banjir-jakarta-071121-ak-4.jpg',
            'target' => 10000000,
            'jumlahsaatini' => 1500000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 3,
            'deskripsi' => 'Penggalangan dana untuk perbaikan fasilitas sekolah dan sarana belajar.',
            'foto' => '/asset/donasi/antarafoto-sekolah-rusak-serang-020523-af-1.jpg',
            'target' => 12000000,
            'jumlahsaatini' => 8000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 4,
            'deskripsi' => 'Donasi sembako dan kebutuhan medis untuk lansia di Panti Jompo Tiara Kasih.',
            'foto' => 'asset/donasi/donasi-panti-jompo.jpg',
            'target' => 30000000,
            'jumlahsaatini' => 29000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 6,
            'deskripsi' => 'Pengadaan buku pelajaran dan perlengkapan sekolah bagi siswa kurang mampu.',
            'foto' => 'asset/donasi/donasi-buku-alatTulis.jpg',
            'target' => 18000000,
            'jumlahsaatini' => 5000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 8,
            'deskripsi' => 'Donasi pangan darurat untuk masyarakat terdampak krisis dan bencana.',
            'foto' => 'asset/donasi/donasi-tenda-pengungsian.jpeg',
            'target' => 7000000,
            'jumlahsaatini' => 4000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 10,
            'deskripsi' => 'Penggalangan dana untuk pengadaan perlengkapan medis di daerah terpencil.',
            'foto' => 'asset/donasi/donasi-puskesmas.jpg',
            'target' => 9000000,
            'jumlahsaatini' => 2500000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

        Donation::create([
            'program_id' => 11,  // Donasi Bantuan Bencana Alam
            'deskripsi' => 'Bantuan untuk korban bencana alam berupa kebutuhan pokok dan logistik darurat.',
            'foto' => 'asset/donasi/donasi-tenda-pengungsian2.jpeg',
            'target' => 20000000,
            'jumlahsaatini' => 5000000,
            'laporan' => '/asset/pdf/laporan1.pdf',
            'laporan_uploaded_at' => '2025-12-30 14:30:00',
        ]);

        Donation::create([
            'program_id' => 12, // Donasi Pendidikan Anak Yatim
            'deskripsi' => 'Donasi untuk mendukung pendidikan anak yatim melalui penyediaan buku dan perlengkapan sekolah.',
            'foto' => 'asset/donasi/donasi-panti.jpg',
            'target' => 15000000,
            'jumlahsaatini' => 3500000,
            'laporan' => '/asset/pdf/laporan2.pdf',
            'laporan_uploaded_at' => '2025-12-30 11:30:00',
        ]);

        Donation::create([
            'program_id' => 13, // Donasi Pengobatan Pasien Kurang Mampu
            'deskripsi' => 'Bantuan biaya pengobatan untuk pasien kurang mampu di daerah terpencil.',
            'foto' => 'asset/donasi/donasi-pasien.jpg',
            'target' => 10000000,
            'jumlahsaatini' => 2500000,
            'laporan' => '/asset/pdf/laporan3.pdf',
            'laporan_uploaded_at' => '2025-12-30 19:30:00',
        ]);

        Donation::create([
            'program_id' => 17, // langsung pakai id program hasil create di atas
            'deskripsi' => 'Pengumpulan biaya untuk anak-anak Yatin desa Peras',
            'foto' => 'asset/donasi/donasi-biaya-sekolah.jpeg',
            'target' => 18000000,
            'jumlahsaatini' => 5000000,
            'laporan' => null,
            'laporan_uploaded_at' => null,
        ]);

    }
}
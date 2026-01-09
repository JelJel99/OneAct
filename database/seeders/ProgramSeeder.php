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
            'organisasi_id' => 1,
            'judul' => 'Bantuan Makanan untuk Lansia Terlantar',
            'type' => 'Relawan',
            'status' => 'approved',
            'tenggat' => now()->addDays(20),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 3,
            'judul' => 'Donasi Bantuan Korban Banjir Sumatra',
            'type' => 'Donasi',
            'status' => 'approved',
            'tenggat' => now()->addDays(10),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 2,
            'judul' => 'Donasi Bantuan Dana Perbaikan Sekolah',
            'type' => 'Donasi',
            'status' => 'approved',
            'tenggat' => now()->addDays(15),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 2,
            'judul' => 'Donasi Panti Jompo Tiara Kasih, Grogor',
            'type' => 'Donasi',
            'status' => 'approved',
            'tenggat' => now()->addDays(30),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 1,
            'judul' => 'Relawan Pendidikan Anak',
            'type' => 'Relawan',
            'status' => 'pending',
            'tenggat' => now()->addDays(25),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 2,
            'judul' => 'Donasi Buku Sekolah',
            'type' => 'Donasi',
            'status' => 'pending',
            'tenggat' => now()->addDays(18),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 3,
            'judul' => 'Relawan Kesehatan Masyarakat',
            'type' => 'Relawan',
            'status' => 'approved',
            'tenggat' => now()->addDays(12),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 1,
            'judul' => 'Donasi Pangan Darurat',
            'type' => 'Donasi',
            'status' => 'pending',
            'tenggat' => now()->addDays(8),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 2,
            'judul' => 'Relawan Kebersihan Lingkungan',
            'type' => 'Relawan',
            'status' => 'pending',
            'tenggat' => now()->addDays(22),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 3,
            'judul' => 'Donasi Perlengkapan Medis',
            'type' => 'Donasi',
            'status' => 'rejected',
            'tenggat' => now()->addDays(28),
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 1,
            'judul' => 'Donasi Bantuan Bencana Alam',
            'type' => 'Donasi',
            'status' => 'approved',
            'tenggat' => '2025-12-01',
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 2,
            'judul' => 'Donasi Pendidikan Anak Yatim',
            'type' => 'Donasi',
            'status' => 'approved',
            'tenggat' => '2025-11-25',
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 3,
            'judul' => 'Donasi Pengobatan Pasien Kurang Mampu',
            'type' => 'Donasi',
            'status' => 'approved',
            'tenggat' => '2025-11-20',
            'created_at' => now(),
        ]);

        Program::create([
            'organisasi_id' => 1,
            'judul' => 'Relawan Pemulihan Lingkungan Pasca Banjir',
            'type' => 'Relawan',
            'status' => 'approved',
            'tenggat' => '2025-08-25',
            'created_at' => now(),
        ]);

        
        Program::create([
            'organisasi_id' => 2,
            'judul' => 'Relawan Pendidikan untuk Anak Desa',
            'type' => 'Relawan',
            'status' => 'approved',
            'tenggat' => '2025-08-01',
            'created_at' => now(),
        ]);
        
        Program::create([
            'organisasi_id' => 3,
            'judul' => 'Relawan Pendampingan Kesehatan Lansia',
            'type' => 'Relawan',
            'status' => 'approved',
            'tenggat' => '2025-08-30',
            'created_at' => now(),
        ]);
        
        Program::create([
            'organisasi_id' => 1,
            'judul' => 'Biaya Pendidikan untuk Anak Yatim',
            'type' => 'donasi',
            'status' => 'approved',
            'tenggat' => '2025-08-25',
            'created_at' => now(),
        ]);

    }
}

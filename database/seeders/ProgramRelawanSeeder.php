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

            'kuota' => 20,
            'start_date' => '2026-01-01',
            'end_date' => '2026-03-31',

            'tanggung_jawab' => 'Mendistribusikan makanan kepada lansia|Mendampingi lansia dalam aktivitas harian|Melaporkan kegiatan kepada koordinator',
            'persyaratan' => 'Minimal usia 18 tahun|Memiliki empati tinggi|Bersedia berinteraksi dengan lansia',
            'benefit' => 'Sertifikat relawan|Pengalaman sosial|Jaringan komunitas',

            'foto' => '/asset/program-makan-bergizi-gratis-kalangan-lansia-dinilai-harus-jadi-prioritas-zab.jpg',
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

            'kuota' => 15,
            'start_date' => '2026-02-01',
            'end_date' => '2026-04-30',

            'tanggung_jawab' => 'Mengajar membaca dan menulis|Membuat materi pembelajaran sederhana|Memotivasi anak untuk belajar',
            'persyaratan' => 'Suka mengajar anak-anak|Sabar dan komunikatif|Diutamakan berlatar pendidikan',
            'benefit' => 'Sertifikat pengabdian|Pengalaman mengajar|Portofolio kegiatan sosial',

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

            'kuota' => 10,
            'start_date' => '2026-01-15',
            'end_date' => '2026-05-15',

            'tanggung_jawab' => 'Memberikan edukasi kesehatan dasar|Membantu pemeriksaan kesehatan ringan|Mencatat data kegiatan',
            'persyaratan' => 'Latar belakang kesehatan lebih diutamakan|Mampu berkomunikasi dengan masyarakat|Bersedia bekerja di lapangan',
            'benefit' => 'Sertifikat relawan|Pengalaman lapangan kesehatan|Relasi profesional',

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

            'kuota' => 25,
            'start_date' => '2026-03-01',
            'end_date' => '2026-06-30',

            'tanggung_jawab' => 'Membersihkan area publik|Mengajak masyarakat peduli lingkungan|Mengedukasi pemilahan sampah',
            'persyaratan' => 'Peduli lingkungan|Mampu bekerja dalam tim|Siap kegiatan outdoor',
            'benefit' => 'Sertifikat relawan|Pengalaman konservasi|Kontribusi nyata untuk lingkungan',

            'foto' => 'assets/relawan/lingkungan.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 14,
            'kategori' => 'Lingkungan',
            'deskripsi' => 'Relawan membantu pemulihan lingkungan pasca banjir dengan membersihkan dan memperbaiki area terdampak.',
            'lokasi' => 'Jakarta',
            'komitmen' => 'Mingguan',
            'keahlian' => 'Manajemen Lingkungan',

            'kuota' => 30,
            'start_date' => '2025-09-01',
            'end_date' => '2025-11-30',

            'tanggung_jawab' => 'Membersihkan area terdampak|Membantu koordinasi evakuasi|Mengedukasi warga terdampak',
            'persyaratan' => 'Fisik sehat|Mampu bekerja di luar ruangan|Berpengalaman di kegiatan sosial',
            'benefit' => 'Sertifikat relawan|Pengalaman lapangan|Jaringan sosial luas',

            'foto' => 'assets/relawan/pemulihan_lingkungan.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 15,
            'kategori' => 'Pendidikan',
            'deskripsi' => 'Relawan mengajar dan membimbing anak-anak di desa agar mendapatkan akses pendidikan yang layak.',
            'lokasi' => 'Yogyakarta',
            'komitmen' => 'Bulanan',
            'keahlian' => 'Pendidikan Anak',

            'kuota' => 20,
            'start_date' => '2025-08-15',
            'end_date' => '2025-11-15',

            'tanggung_jawab' => 'Mengajar anak-anak|Membuat materi pembelajaran kreatif|Membimbing belajar kelompok',
            'persyaratan' => 'Sabar dan komunikatif|Berpengalaman mengajar|Mampu beradaptasi dengan anak-anak',
            'benefit' => 'Sertifikat relawan|Pengalaman mengajar|Pengembangan soft skills',

            'foto' => 'assets/relawan/pendidikan_anak.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ProgramRelawan::create([
            'program_id' => 16,
            'kategori' => 'Kesehatan',
            'deskripsi' => 'Relawan mendampingi lansia dalam kegiatan kesehatan dan sosial di komunitas lokal.',
            'lokasi' => 'Surabaya',
            'komitmen' => 'Mingguan',
            'keahlian' => 'Pendampingan Kesehatan',

            'kuota' => 15,
            'start_date' => '2025-09-10',
            'end_date' => '2025-11-20',

            'tanggung_jawab' => 'Mendampingi pemeriksaan kesehatan|Membantu aktivitas harian lansia|Mengedukasi kesehatan dasar',
            'persyaratan' => 'Sabar dan empati tinggi|Pengalaman pendampingan kesehatan|Mampu bekerja mandiri',
            'benefit' => 'Sertifikat relawan|Pengalaman sosial|Kepuasan membantu lansia',

            'foto' => 'assets/relawan/pendampingan_kesehatan.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
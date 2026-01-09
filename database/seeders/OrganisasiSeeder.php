<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Organisasi;

class OrganisasiSeeder extends Seeder
{
    public function run(): void
    {
        Organisasi::create([
            'user_id' => 5,
            'nama' => 'Rumah Cinta Indonesia',
            'visi' => 'Membantu sesama',
            'misi' => 'Memberikan bantuan sosial',
            'email' => 'rumahcinta@organisasi.id',
            'telepon' => '08123456789',
            'alamat' => 'Jakarta',
            'tagline' => 'Menebar Kasih, Merajut Asa untuk Sesama.'
        ]);

        Organisasi::create([
            'user_id' => 6,
            'nama' => 'Yayasan Peduli Anak Indonesia',
            'visi' => 'Pendidikan untuk semua',
            'misi' => 'Mengajar anak-anak kurang mampu',
            'email' => 'info@pedulianak.id',
            'telepon' => '08198765432',
            'alamat' => 'Bandung',
            'tagline' => 'Wujudkan Mimpi Melalui Pendidikan yang Merata'
        ]);

        Organisasi::create([
            'user_id' => 7,
            'nama' => 'Peduli Bencana Nusantara',
            'visi' => 'Membangun kesiapsiagaan bencana',
            'misi' => 'Memberikan bantuan dan edukasi bencana alam',
            'email' => 'contact@pedulibencana.id',
            'telepon' => '0821122334455',
            'alamat' => 'Surabaya',
            'tagline' => 'Siaga Bertindak, Tangguh Menghadapi Bencana'
        ]);

        // Organisasi::create([
        //     'nama' => 'Komunitas Sehat Bersama',
        //     'visi' => 'Masyarakat sehat dan produktif',
        //     'misi' => 'Mengadakan kegiatan kesehatan dan edukasi',
        //     'email' => 'info@sehatbersama.org',
        //     'telepon' => '0812999887766',
        //     'alamat' => 'Yogyakarta',
        //     'tagline' => 'Langkah Nyata Menuju Hidup Sehat dan Produktif'
        // ]);

        // Organisasi::create([
        //     'nama' => 'Laskar Pendidikan',
        //     'visi' => 'Meningkatkan kualitas pendidikan',
        //     'misi' => 'Mendukung pendidikan anak-anak di daerah terpencil',
        //     'email' => 'contact@laskarpendidikan.id',
        //     'telepon' => '081355577899',
        //     'alamat' => 'Malang',
        //     'tagline' => 'Melindungi Harapan, Mengubah Masa Depan'
        // ]);

        // Organisasi::create([
        //     'nama' => 'Sahabat Lansia',
        //     'visi' => 'Kesejahteraan lansia',
        //     'misi' => 'Memberikan pendampingan dan perawatan lansia',
        //     'email' => 'info@sahabatlansia.org',
        //     'telepon' => '081422233344',
        //     'alamat' => 'Semarang',
        //     'tagline' => 'Ketulusan Hati di Setiap Masa Tua'
        // ]);

        // Organisasi::create([
        //     'nama' => 'Gerakan Hijau Indonesia',
        //     'visi' => 'Lingkungan hidup yang lestari',
        //     'misi' => 'Mengkampanyekan penghijauan dan pelestarian alam',
        //     'email' => 'gerakan@hijauindonesia.id',
        //     'telepon' => '082233344455',
        //     'alamat' => 'Bali',
        //     'tagline' => 'Lestarikan Alam, Wariskan Kebaikan untuk Bumi'
        // ]);

        // Organisasi::create([
        //     'nama' => 'Peduli Anak Jalanan',
        //     'visi' => 'Masa depan cerah untuk anak jalanan',
        //     'misi' => 'Memberikan pendidikan dan perlindungan untuk anak jalanan',
        //     'email' => 'contact@anakjalanan.id',
        //     'telepon' => '081377799900',
        //     'alamat' => 'Medan',
        //     'tagline' => 'Melindungi Harapan, Mengubah Masa Depan'
        // ]);

        // Organisasi::create([
        //     'nama' => 'Relawan Kemanusiaan',
        //     'visi' => 'Bantuan kemanusiaan cepat dan tepat',
        //     'misi' => 'Menyediakan bantuan untuk korban bencana dan konflik',
        //     'email' => 'info@relawankemanusiaan.org',
        //     'telepon' => '081455566677',
        //     'alamat' => 'Palembang',
        //     'tagline' => 'Cepat Bertindak, Tepat Memberi Bantuan'
        // ]);

        // Organisasi::create([
        //     'nama' => 'Komunitas Kreatif Muda',
        //     'visi' => 'Memberdayakan generasi muda',
        //     'misi' => 'Mengembangkan kreativitas dan keterampilan anak muda',
        //     'email' => 'contact@kreatifmuda.id',
        //     'telepon' => '081488899900',
        //     'alamat' => 'Bandung',
        //     'tagline' => 'Inovasi Tanpa Batas, Karya Nyata Anak Muda'
        // ]);
    }
}
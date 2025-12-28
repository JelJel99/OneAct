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
            'nama' => 'Rumah Cinta Indonesia',
            'visi' => 'Membantu sesama',
            'misi' => 'Memberikan bantuan sosial',
            'email' => 'info@rumahcinta.id',
            'telepon' => '08123456789',
            'alamat' => 'Jakarta'
        ]);

        Organisasi::create([
            'nama' => 'Yayasan Peduli Anak Indonesia',
            'visi' => 'Pendidikan untuk semua',
            'misi' => 'Mengajar anak-anak kurang mampu',
            'email' => 'info@pedulianak.id',
            'telepon' => '08198765432',
            'alamat' => 'Bandung'
        ]);

        Organisasi::create([
            'nama' => 'Peduli Bencana Nusantara',
            'visi' => 'Membangun kesiapsiagaan bencana',
            'misi' => 'Memberikan bantuan dan edukasi bencana alam',
            'email' => 'contact@pedulibencana.id',
            'telepon' => '0821122334455',
            'alamat' => 'Surabaya'
        ]);

        Organisasi::create([
            'nama' => 'Komunitas Sehat Bersama',
            'visi' => 'Masyarakat sehat dan produktif',
            'misi' => 'Mengadakan kegiatan kesehatan dan edukasi',
            'email' => 'info@sehatbersama.org',
            'telepon' => '0812999887766',
            'alamat' => 'Yogyakarta'
        ]);

        Organisasi::create([
            'nama' => 'Laskar Pendidikan',
            'visi' => 'Meningkatkan kualitas pendidikan',
            'misi' => 'Mendukung pendidikan anak-anak di daerah terpencil',
            'email' => 'contact@laskarpendidikan.id',
            'telepon' => '081355577899',
            'alamat' => 'Malang'
        ]);

        Organisasi::create([
            'nama' => 'Sahabat Lansia',
            'visi' => 'Kesejahteraan lansia',
            'misi' => 'Memberikan pendampingan dan perawatan lansia',
            'email' => 'info@sahabatlansia.org',
            'telepon' => '081422233344',
            'alamat' => 'Semarang'
        ]);

        Organisasi::create([
            'nama' => 'Gerakan Hijau Indonesia',
            'visi' => 'Lingkungan hidup yang lestari',
            'misi' => 'Mengkampanyekan penghijauan dan pelestarian alam',
            'email' => 'gerakan@hijauindonesia.id',
            'telepon' => '082233344455',
            'alamat' => 'Bali'
        ]);

        Organisasi::create([
            'nama' => 'Peduli Anak Jalanan',
            'visi' => 'Masa depan cerah untuk anak jalanan',
            'misi' => 'Memberikan pendidikan dan perlindungan untuk anak jalanan',
            'email' => 'contact@anakjalanan.id',
            'telepon' => '081377799900',
            'alamat' => 'Medan'
        ]);

        Organisasi::create([
            'nama' => 'Relawan Kemanusiaan',
            'visi' => 'Bantuan kemanusiaan cepat dan tepat',
            'misi' => 'Menyediakan bantuan untuk korban bencana dan konflik',
            'email' => 'info@relawankemanusiaan.org',
            'telepon' => '081455566677',
            'alamat' => 'Palembang'
        ]);

        Organisasi::create([
            'nama' => 'Komunitas Kreatif Muda',
            'visi' => 'Memberdayakan generasi muda',
            'misi' => 'Mengembangkan kreativitas dan keterampilan anak muda',
            'email' => 'contact@kreatifmuda.id',
            'telepon' => '081488899900',
            'alamat' => 'Bandung'
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::insert([
            [
                'question' => 'Bagaimana cara saya berdonasi?',
                'answer'   => 'Klik menu Donasi, pilih nominal, lalu selesaikan pembayaran.',
                'category' => 'Donasi',
                'order'    => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah donasi bisa rutin setiap bulan?',
                'answer'   => 'Ya, kamu dapat memilih donasi bulanan saat checkout.',
                'category' => 'Donasi',
                'order'    => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara menjadi relawan?',
                'answer'   => 'Daftar melalui halaman Relawan dan isi formulir pendaftaran.',
                'category' => 'Relawan',
                'order'    => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah relawan harus datang langsung?',
                'answer'   => 'Tidak, tersedia program relawan online.',
                'category' => 'Relawan',
                'order'    => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
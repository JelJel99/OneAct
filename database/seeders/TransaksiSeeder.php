<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        Transaksi::insert([
            [
                'user_id'   => 2, // Dummy User
                'donasi_id' => 2,
                'jumlah'    => 250000,
                'buktibayar'=> 'bukti_1.jpg',
                'created_at'=> now()->subDays(30),
                'updated_at'=> now()->subDays(30),
            ],
            [
                'user_id'   => 2,
                'donasi_id' => 5,
                'jumlah'    => 500000,
                'buktibayar'=> 'bukti_2.jpg',
                'created_at'=> now()->subDays(15),
                'updated_at'=> now()->subDays(15),
            ],
            [
                'user_id'   => 2,
                'donasi_id' => 6,
                'jumlah'    => 100000,
                'buktibayar'=> 'bukti_3.jpg',
                'created_at'=> now()->subDays(5),
                'updated_at'=> now()->subDays(5),
            ],
        ]);
    }
}
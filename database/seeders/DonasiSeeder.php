<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Donasi::create([
            'program_id' => 2,
            'deskripsi' => 'Bantuan makanan untuk lansia terlantar.',
            'foto' => 'program-makan-bergizi-gratis.jpg',
            'target' => 21000000,
            'jumlahsaatini' => 10500000
        ]);
    }
}

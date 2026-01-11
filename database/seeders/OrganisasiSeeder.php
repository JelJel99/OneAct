<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisasiSeeder extends Seeder
{
    public function run(): void
    {
        // database/seeders/OrganisasiSeeder.php
        Organisasi::create([
            [
                'id' => 1,
                'nama' => 'Yayasan Peduli Anak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'Gerakan Cerdas Bangsa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'Teach for Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama' => 'Komunitas Indonesia Membaca',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomunitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('komunitas')->insert([
            [
                'organisasi_id' => 1,
                'nama' => 'PawFriends',
                'deskripsi' => 'Komunitas pecinta hewan dan volunteer vaksinasi hewan peliharaan.',
                'kategori' => 'kesehatan',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'organisasi_id' => 3,
                'nama' => 'Green Earth',
                'deskripsi' => 'Bergabunglah dengan gerakan penanaman pohon dan pelestarian lingkungan.',
                'kategori' => 'lingkungan',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'organisasi_id' => 2,
                'nama' => 'EduShare',
                'deskripsi' => 'Program donasi buku dan pemberdayaan pendidikan untuk anak-anak kurang mampu.',
                'kategori' => 'pendidikan',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'organisasi_id' => 1,
                'nama' => 'HelpingHands',
                'deskripsi' => 'Komunitas siaga bencana dan distribusi bantuan untuk korban bencana alam.',
                'kategori' => 'sosial',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
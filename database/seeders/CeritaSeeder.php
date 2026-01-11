<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\carbon;
use Illuminate\Support\Facades\DB;

class CeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cerita')->insert([
            [
                'komunitas_id' => 1, // Hewan
                'nama' => 'Angela',
                'cerita' => 'Aku ikut donasi buat bantu kucing dan anjing terlantar yang lagi dirawat. Dari bantuan kecil itu, mereka bisa dapat makan dan obat. Senang rasanya tahu donasi kita benar-benar kepakai.',
                'peran' => 'donatur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'komunitas_id' => 1, // Hewan
                'nama' => 'Vivin',
                'cerita' => 'Aku pernah ikut jadi relawan di shelter hewan. Tugasnya simpel, bersihin kandang dan kasih makan. Tapi lihat mereka jadi lebih tenang itu bikin hati adem.',
                'peran' => 'relawan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'komunitas_id' => 2, // Lingkungan
                'nama' => 'Chara',
                'cerita' => 'Kami turun langsung bersih-bersih sungai yang penuh sampah. Awalnya jijik, lama-lama jadi terbiasa. Pulang dengan badan capek, tapi puas lihat sungainya lebih bersih.',
                'peran' => 'relawan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'komunitas_id' => 2, // Lingkungan
                'nama' => 'Nabilah',
                'cerita' => 'Aku ikut donasi buat program penanaman pohon. Walaupun nggak ikut nanam langsung, rasanya tetap bangga. Setidaknya ada kontribusi kecil buat bumi.',
                'peran' => 'donatur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'komunitas_id' => 3, // Pendidikan
                'nama' => 'Dea',
                'cerita' => 'Aku bantu ngajar anak-anak tiap akhir pekan. Mereka sering nanya hal sederhana tapi bikin mikir. Dari situ aku sadar, waktu kita itu berharga banget buat mereka.',
                'peran' => 'relawan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'komunitas_id' => 3, // Pendidikan
                'nama' => 'Jel',
                'cerita' => 'Aku ikut donasi alat tulis buat anak-anak yang kekurangan. Kelihatannya sepele, tapi buat mereka itu penting. Senyum mereka pas nerima bantuannya bikin hangat.',
                'peran' => 'donatur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'komunitas_id' => 4, // Sosial
                'nama' => 'Nab',
                'cerita' => 'Aku ikut relawan di dapur umum waktu ada bencana. Kerjanya masak dan bagi makanan. Capek, tapi rasanya berarti banget bisa bantu orang lain.',
                'peran' => 'relawan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'komunitas_id' => 4, // Sosial
                'nama' => 'Char',
                'cerita' => 'Aku ikut donasi buat warga yang terdampak banjir. Nggak besar, tapi kalau bareng-bareng jadi terasa dampaknya. Setidaknya bisa bantu sedikit.',
                'peran' => 'donatur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaksi'; // pakai nama tabel 'transaksi' sesuai kode #2

    protected $fillable = [
        'user_id',        // dari #2
        'donasi_id',      // dari #2 (sesuai database lokal)
        'jumlah',         // dari #1, bisa dipakai sebagai alias 'jumlah'
        'payment_type', // dari #1
        'payment_method', // dari #1
        'buktibayar',     // dari #1, sinonim 'buktibayar'
    ];

    public function donasi()
    {
        return $this->belongsTo(Donation::class, 'donasi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
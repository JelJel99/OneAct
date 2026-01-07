<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notUse_Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'donasi_id',
        'jumlah',
        'buktibayar',
    ];

    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
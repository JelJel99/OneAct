<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';

    protected $fillable = [
        'program_id', 
        'deskripsi', 
        'foto', 'target', 
        'jumlahsaatini', 
        'laporan'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function getProgressAttribute()
    {
        if ($this->target == 0) return 0;
        return round(($this->jumlahsaatini / $this->target) * 100);
    }
}

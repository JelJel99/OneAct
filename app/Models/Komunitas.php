<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;

    protected $table = 'komunitas';
    protected $fillable = [
        'organisasi_id',
        'nama',
        'deskripsi',
        'kategori',
        'foto',
    ];

    // Relationship dengan anggota komunitas
    public function anggota()
    {
        return $this->hasMany(KomunitasAnggota::class, 'komunitas_id');
    }

    // Get jumlah anggota
    public function jumlahAnggota()
    {
        return $this->anggota()->count();
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function cerita()
    {
        return $this->hasMany(Cerita::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomunitasAnggota extends Model
{
    use HasFactory;

    protected $table = 'komunitas_anggota';
    protected $fillable = [
        'komunitas_id',
        'user_id',
    ];

    // Relationship dengan komunitas
    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class);
    }

    // Relationship dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

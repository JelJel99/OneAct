<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRelawan extends Model
{
    protected $table = 'programrelawan';

    protected $fillable = [
        'program_id', 
        'kategori', 
        'deskripsi',
        'lokasi', 
        'komitmen', 
        'keahlian', 
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function relawanDaftars()
    {
        return $this->hasMany(RelawanDaftar::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRelawan extends Model
{
    protected $table = 'programrelawan'; // kalau nama tabel bukan plural standar

    protected $fillable = [
        'program_id', 
        'kategori', 
        'tenggat', 
        'deskripsi', 
        'lokasi', 
        'komitmen', 
        'keahlian', 
        'foto'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

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

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'organisasi';

    protected $fillable = [
        'nama', 
        'visi', 
        'misi', 
        'email', 
        'telepon', 
        'alamat'
    ];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cerita extends Model
{
    protected $table = 'cerita';
    
    protected $fillable = [
        'komunitas_id',
        'nama',
        'cerita',
        'peran'
    ];

    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class);
    }
}

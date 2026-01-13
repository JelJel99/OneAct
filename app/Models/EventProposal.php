<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventProposal extends Model
{
    protected $table = 'event_proposal';
    
    protected $fillable = [
        'komunitas_id',
        'nama_event',
        'deskripsi',
        'tanggal',
        'lokasi',
        'kebutuhan_relawan',
        'status'
    ];

    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class);
    }
}

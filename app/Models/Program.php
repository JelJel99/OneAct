<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'organisasi_id', 
        'judul', 
        'type', 
        'tenggat', 
        'status',
        'created_at'
    ];

    public function relawan()
    {
        return $this->hasOne(ProgramRelawan::class);
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'organisasi_id');
    }

    public function programRelawan()
    {
        return $this->hasOne(ProgramRelawan::class);
    }

    public function donasi()
    {
        return $this->hasOne(Donasi::class);
    }    

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Donation extends Model
{
    protected $table = 'donasi'; // pakai tabel 'donasi' sesuai DB asli

    protected $fillable = [
        'program_id',
        'deskripsi',
        'foto',
        'target',
        'jumlahsaatini',
        'laporan',
        'laporan_uploaded_at',    
    ];

    protected $casts = [
        'laporan_uploaded_at' => 'datetime',
    ];
    
    protected $appends = ['status', 'progress'];
    public function getStatusAttribute()
    {
        // pastikan relasi program ada
        if (!$this->relationLoaded('program')) {
            $this->load('program');
        }
        
        if (!$this->program || !$this->program->tenggat) {
            return 'tidak diketahui';
        }
        
        $today = Carbon::today();
        $end   = Carbon::parse($this->program->tenggat);
        
        if ($today->gt($end)) {
            return 'Selesai';
        }
        
        return 'Dalam Pelaksanaan';
    }
    
    public function getProgressAttribute()
    {
        if ($this->target == 0) return 0;
        // gunakan collected karena menggantikan jumlahsaatini
        return round(($this->jumlahsaatini / $this->target) * 100);
    }
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'donasi_id');
    }
}
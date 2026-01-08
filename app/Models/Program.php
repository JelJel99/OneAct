<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

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

    protected $appends = ['status_otomatis'];
    public function getStatusOtomatisAttribute()
    {
        $today = Carbon::today();

        // =====================
        // PROGRAM RELAWAN
        // =====================
        if ($this->type === 'relawan' && $this->relationLoaded('relawan') && $this->relawan) {
            $start = Carbon::parse($this->relawan->start_date);
            $end   = Carbon::parse($this->relawan->end_date);

            if ($today->lt($start)) {
                return 'perekrutan';
            }

            if ($today->lte($end)) {
                return 'dalam pelaksanaan';
            }

            return 'selesai';
        }

        // =====================
        // PROGRAM DONASI
        // =====================
        if ($this->type === 'donasi' && $this->tenggat) {
            return $today->gt(Carbon::parse($this->tenggat))
                ? 'selesai'
                : 'dalam pelaksanaan';
        }

        return 'tidak diketahui';
    }

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
        return $this->hasOne(Donation::class);
    }    

}
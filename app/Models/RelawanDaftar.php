<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RelawanDaftar extends Model
{
    protected $table = 'relawandaftar';

    protected $fillable = [
        'user_id',
        'programrelawan_id',
        // 'status',
    ];

    protected $appends = ['status'];
    public function getStatusAttribute()
    {
        // pastikan relasi ada
        if (!$this->relationLoaded('programRelawan')) {
            $this->load('programRelawan');
        }

        $today = Carbon::today();

        $start = Carbon::parse($this->programRelawan->start_date);
        $end   = Carbon::parse($this->programRelawan->end_date);

        if ($today->gt($end)) {
            return 'selesai';
        }

        if ($today->gte($start)) {
            return 'dalam pelaksanaan';
        }

        return 'diterima';
    }

    public function programRelawan()
    {
        return $this->belongsTo(ProgramRelawan::class, 'programrelawan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
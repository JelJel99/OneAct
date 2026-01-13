<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProgramRelawan extends Model
{
    protected $table = 'programrelawan';

    protected $fillable = [
        'program_id',
        'kategori',
        'deskripsi',
        'lokasi',
        'komitmen',
        'start_date',
        'end_date',
        'keahlian',
        'foto',
        'tanggung_jawab',
        'kuota',
        'persyaratan',
        'benefit',
    ];

    protected $appends = ['status_otomatis'];
    public function getStatusOtomatisAttribute()
    {
        $today = Carbon::today();
        $start = Carbon::parse($this->start_date);
        $end   = Carbon::parse($this->end_date);

        if ($today->gt($end)) {
            return 'selesai';
        }

        if ($today->gte($start)) {
            return 'dalam pelaksanaan';
        }

        return 'perekrutan';
    }

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

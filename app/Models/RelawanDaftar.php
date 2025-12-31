<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelawanDaftar extends Model
{
    protected $table = 'relawandaftar';

    protected $fillable = [
        'user_id',
        'programrelawan_id',
        'status',
    ];

    public function programRelawan()
    {
        return $this->belongsTo(ProgramRelawan::class, 'programrelawan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
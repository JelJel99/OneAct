<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'forum';
    protected $fillable = [
        'komunitas_id',
        'user_id',
        'user_name',
        'pesan',
    ];

    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'forum_id');
    }
}

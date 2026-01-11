<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'message',
        'is_resolved',
    ];
    
    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
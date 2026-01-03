<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelawandaftarModel extends Model
{
    protected $table = 'relawandaftar';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function programrelawan()
    {
        return $this->belongsTo(ProgramrelawanModel::class, 'programrelawan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

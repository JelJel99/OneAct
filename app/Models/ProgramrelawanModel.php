<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramrelawanModel extends Model
{
    protected $table = 'programrelawan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function relawandaftar()
    {
        return $this->hasMany(RelawandaftarModel::class, 'programrelawan_id', 'id');
    }
}

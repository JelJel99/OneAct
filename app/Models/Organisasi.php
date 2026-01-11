<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'organisasi';

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}

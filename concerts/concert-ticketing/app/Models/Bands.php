<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bands extends Model
{
    public function concerts()
    {
        return $this->hasMany(Concerts::class);
    }
}

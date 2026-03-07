<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concerts extends Model
{
    public function band()
    {
        return $this->belongsTo(Bands::class);
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['band_id', 'date', 'location'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

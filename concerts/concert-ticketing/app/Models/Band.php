<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
protected $fillable = ['name', 'genre'];
public function concerts()
    {
        return $this->hasMany(Concert::class);
    }
}

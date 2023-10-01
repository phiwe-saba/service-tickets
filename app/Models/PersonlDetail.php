<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonlDetail extends Model
{
    use HasFactory;

    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }
}

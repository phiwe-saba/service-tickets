<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    //function will related retrieve data 
    public function interests(){
        return $this->belongsToMany(Interest::class);
    }
}

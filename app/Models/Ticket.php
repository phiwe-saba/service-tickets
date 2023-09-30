<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date_logged',
        'status_id',
        'department_id',
        'user_id'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

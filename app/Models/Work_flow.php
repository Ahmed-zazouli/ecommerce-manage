<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_flow extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}

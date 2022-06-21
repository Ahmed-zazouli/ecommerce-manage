<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];

    public function user_type(){
        return $this->belongsTo(User_type::class);
    }

    public function user_address(){
        return $this->hasOne(User_address::class);
    }
    public function userAddress(){
        return $this->hasOne(User_address::class);
    }

    public function user_payment(){
        return $this->hasOne(User_payment::class);
    }

    public function work_flow(){
        return $this->hasMany(Work_flow::class);
    }
}

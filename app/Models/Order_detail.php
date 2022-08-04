<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        $this->belongsTo(User::class);
    }

    // public function payment_details(){
    //     $this->hasMany()
    // }
}

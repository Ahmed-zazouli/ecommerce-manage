<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_categorie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function store_categorie(){
        return $this->belongsTo(Store_categorie::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}

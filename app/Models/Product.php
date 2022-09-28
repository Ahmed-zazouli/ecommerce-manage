<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = []; 
    
    public function product_categorie(){
        return $this->belongsTo(Product_categorie::class);
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }
}

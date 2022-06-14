<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store_categorie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productCategorie(){
        return $this->hasMany(Product_categorie::class);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name' , 100);
            $table->text('description' ,250);
            $table->string('SKU' , 50);
            $table->string('photo' , 100);
            $table->unsignedBigInteger("product_categorie_id");
            $table->foreign('product_categorie_id')->references('id')->on('product_categories');
            $table->integer('quantity');
            $table->float('price_buy');
            $table->float('price_sell');
            $table->unsignedBigInteger("discount_id")->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts');                      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

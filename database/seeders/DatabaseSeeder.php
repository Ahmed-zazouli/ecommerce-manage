<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Product_categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Store_categorie ;
use App\Models\User;
use App\Models\User_address;
use App\Models\User_payment;
use App\Models\User_type;
use Carbon\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         
     $discount[] = Discount::factory(10)->create();
     $store = Store_categorie::factory(10)
     ->has(Product_categorie::factory(3)->has(Product::factory(2) ) , 'productCategorie' )->create();

     User_type::factory(5)->has(User::factory(4)->has(User_address::factory(1)))->create();

     User_payment::factory(10)->create();

     // $user = User::find(10);
    //  $user_payment = ' ';
    // $user_payment->User_payment()->associate($user);
    // $user_payment->save();

//      $firstUser = User::first();
//      User_payment::first()->user()->associate($firstUser)->save();
//      $account = Account::find(10);
 
// $user->account()->associate($account);
 
// $user->save();
     
     
     // User_payment::factory()->forUser()->create();
        
    // $product = Product::factory(4)->forDiscount($discount)->create();



   /*     Discount::factory(10)->create();
        Product::factory(10)->create();
        User_type::factory(10)->create();
        User::factory(10)->create();
        User_address::factory(10)->create();
        User_payment::factory(10)->create(); 

        */
        
        $this->call([
          //  StoreCategorieSeeder::class,
            
        ]);
    }
}

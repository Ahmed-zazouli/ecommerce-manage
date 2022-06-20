<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreCategorieController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkFlowController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Store_categorie;
use App\Models\User_address;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('login', function () {
//     return view('auth.registerr');

// })->name('loginn');

// Route::POST('/admin/user' ,[UserController::class ,'userlogin'])->name('user');

// Route::get('/admin/logout', function () {
//     if(session()->has('user')){
//         session()->pull('user');
//     }
//     return to_route('login');

// })->name('logout');





// Route::get('/home', function () {
//     return response('Hello World', 200)
//                   ->header('Content-Type', 'text/plain');
// });







Route::prefix('admin')->group(function(){
    Auth::routes(); 
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return view('admin', [
            'products' => Product::with('product_categorie')->get()
    
        ]);
    })->name('admin')->middleware('auth');



    Route::get('/product_categories', [ProductCategorieController::class , 'index'])->name('product_categories.index');
    Route::delete('/product_categories/{product_categorie}', [ProductCategorieController::class , 'destroy'])->name('product_categories.destroy');
    Route::get('/product_categories/create', [ProductCategorieController::class , 'create'])->name('product_categories.create');
    Route::post('/product_categories', [ProductCategorieController::class , 'store'])->name('product_categories.store');
    Route::put('/product_categories/{product_categorie}', [ProductCategorieController::class , 'update'])->name('product_categories.update');
    Route::get('/product_categories/{product_categorie}/edit', [ProductCategorieController::class , 'edit'])->name('product_categories.edit');


    Route::get('/store_categories', [StoreCategorieController::class , 'index'])->name('store_categories.index');
    Route::delete('/store_categories/{store_categorie}', [StoreCategorieController::class , 'destroy'])->name('store_categories.destroy');
    Route::get('/store_categories/create', [StoreCategorieController::class , 'create'])->name('store_categories.create');
    Route::post('/store_categories', [StoreCategorieController::class , 'store'])->name('store_categories.store');
    Route::put('/store_categories/{store_categorie}', [StoreCategorieController::class , 'update'])->name('store_categories.update');
    Route::get('/store_categories/{store_categorie}/edit', [StoreCategorieController::class , 'edit'])->name('store_categories.edit');

    
   
  

    Route::resources([
        'products' => ProductController::class,
        'users' => UserController::class,
        'work_flows' => WorkFlowController::class,
        'user_addresses' =>UserAddressController::class
        // 'product_categories' => ProductCategorieController::class ,
        // 'store_categories' => StoreCategorieController::class ,
    
    ]);




    Route::get('unauthorize' , function(){
        return view('errors.unauthorize');
    })->name('unauthorize');

    Route::get('cards', function () {
        return view('components.cards');
    
    })->name('cards')->middleware('auth');  
    
    Route::get('basic_input', function () {
        return view('components.basic_inputs', );
    })->name('basic_inputs')->middleware('auth');
    
    Route::get('input_groups', function () {
        return view('components.input_groups', );
    })->name('input_groups')->middleware('auth');
    
    Route::get('horizontal_form', function () {
        return view('components.horizontal_form', );
    })->name('horizontal_form')->middleware('auth');
    
    Route::get('vertical_form', function () {
        return view('components.vertical_form', );
    })->name('vertical_form')->middleware('auth');
    
    Route::get('tables', function () {
        return view('components.tables', );
    })->name('tables')->middleware('auth');
    
    


});


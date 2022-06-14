<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Discount;
use App\Models\Product_categorie;
use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $livres = Product::paginate(10);
        // return view('livres.index', compact('livres'));

        return view('products.product', [
            'products' => Product::with('product_categorie')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.addproduct',[
            'categories' => Product_categorie::get() ,
            'discounts' => Discount::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $Product = Product::create( $request->all());
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function show(Product $product)
    // {
    //     return to_route('products.index');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data=[
            'product'=>$product
        ];
        return view('products.updateproduct' , $data ,[
            'categories' => Product_categorie::get() ,
            'discounts' => Discount::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        
       // $Product = Product::find($product);
        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->SKU = $request->input('SKU');
        $product->product_categorie_id = $request->input('product_categorie_id');
        $product->quantity = $request->input('quantity');
        $product->price_sell = $request->input('price_sell');
        $product->price_buy = $request->input('price_buy');
        $product->discount_id = $request->input('discount_id');

        
        $product->save();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete() ;

        return to_route('products.index');
    }
}

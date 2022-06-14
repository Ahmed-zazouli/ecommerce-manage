<?php

namespace App\Http\Controllers;

use App\Models\Product_categorie;
use App\Http\Requests\StoreProduct_categorieRequest;
use App\Http\Requests\UpdateProduct_categorieRequest;
use App\Models\Store_categorie;

class ProductCategorieController extends Controller
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
        return view('product_categories.product_categorie' ,[
          'product_categories' => Product_categorie::with('store_categorie')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_categories.addproduct_categorie' , [
            'store_categories' => Store_categorie::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduct_categorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct_categorieRequest $request)
    {
        Product_categorie::create($request->all());
        return to_route('product_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Product_categorie $product_categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_categorie $product_categorie)
    {
        
        $data=[
            'product_categorie'=>$product_categorie
        ];

        // echo($product_categorie);
        return view('product_categories.updateproduct_categorie', $data, [
           'store_categories' => Store_categorie::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduct_categorieRequest  $request
     * @param  \App\Models\Product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct_categorieRequest $request, Product_categorie $product_categorie)
    {
        $product_categorie->name = $request->input('name');
        $product_categorie->store_categorie_id = $request->input('store_categorie_id');
        $product_categorie->description = $request->input('description');

        
        $product_categorie->save();
        
        return to_route('product_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_categorie $product_categorie)
    {
        // echo($product_categorie);
        $product_categorie->delete();

        return to_route('product_categories.index');
    }
}

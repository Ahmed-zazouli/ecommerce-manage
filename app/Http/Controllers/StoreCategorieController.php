<?php

namespace App\Http\Controllers;

use App\Models\Store_categorie;
use App\Http\Requests\StoreStore_categorieRequest;
use App\Http\Requests\UpdateStore_categorieRequest;
use App\Http\Controllers\WorkFlowController;

class StoreCategorieController extends Controller
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
        return view('store_categories.store_categorie' , [
            'store_categories' => Store_categorie::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store_categories.addstore_categorie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStore_categorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStore_categorieRequest $request)
    {
        Store_categorie::create($request->all());       

        (new WorkFlowController)->work_flow('create' ,'store_categorie');
        
        return to_route('store_categories.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store_categorie  $store_categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Store_categorie $store_categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store_categorie  $store_categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Store_categorie $store_categorie)
    {
        $data=[
            'store_categorie' => $store_categorie
        ];
        return view('store_categories.updatestore_categorie' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStore_categorieRequest  $request
     * @param  \App\Models\Store_categorie  $store_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStore_categorieRequest $request, Store_categorie $store_categorie)
    {
        $store_categorie->name = $request->input('name');
        $store_categorie->description = $request->input('description');

        
        $store_categorie->save();
        (new WorkFlowController)->work_flow('update' ,'store_categorie');
        
        return to_route('store_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store_categorie  $store_categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store_categorie $store_categorie)
    {
        $store_categorie->delete();
        (new WorkFlowController)->work_flow('delete' ,'store_categorie');

        return to_route('store_categories.index');
    }
}

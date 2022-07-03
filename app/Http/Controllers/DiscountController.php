<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
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
        return view('discounts.discount', [
            'discounts' => Discount::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(('discounts.adddiscount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscountRequest $request)
    {
        $active = 0;
        if($request['active'] == 'on'){
            $active = 1;
        }
        Discount::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'active' => $active
        ]);

        (new WorkFlowController)->work_flow('create' ,'discounts');
        return to_route('discounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        $data=[
           'discount'=> $discount 
        ];

        return view('discounts.updatediscount',$data );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscountRequest  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->name = $request['name'];
        $discount->description = $request['description'];
        $active = 0;
        if($request['active'] == 'on'){
            $active = 1;
        }
        $discount->active = $active;

        $discount->save();
        (new WorkFlowController)->work_flow('update' ,'discounts');
        return to_route('discounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
       $discount->delete();
       (new WorkFlowController)->work_flow('delete' ,'discounts');
        return to_route('discounts.index');
    }
}

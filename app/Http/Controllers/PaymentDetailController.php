<?php

namespace App\Http\Controllers;

use App\Models\Payment_detail;
use App\Http\Requests\StorePayment_detailRequest;
use App\Http\Requests\UpdatePayment_detailRequest;

class PaymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePayment_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayment_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment_detail  $payment_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Payment_detail $payment_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment_detail  $payment_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment_detail $payment_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayment_detailRequest  $request
     * @param  \App\Models\Payment_detail  $payment_detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayment_detailRequest $request, Payment_detail $payment_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment_detail  $payment_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment_detail $payment_detail)
    {
        //
    }
}

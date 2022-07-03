<?php

namespace App\Http\Controllers;

use App\Models\User_payment;
use App\Http\Requests\StoreUser_paymentRequest;
use App\Http\Requests\UpdateUser_paymentRequest;
use App\Models\User;

class UserPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_payments.user_payment',[
            'user_payments' => User_payment::with('user')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_payments.adduser_payment', [
            'users' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_paymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_paymentRequest $request)
    {
       User_payment::create($request->all());
        (new WorkFlowController)->work_flow('create', 'user_paymets');
        return to_route('user_payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_payment  $user_payment
     * @return \Illuminate\Http\Response
     */
    public function show(User_payment $user_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_payment  $user_payment
     * @return \Illuminate\Http\Response
     */
    public function edit(User_payment $user_payment)
    {
        $data =[
         'user_payment' => $user_payment,
         'users' => User::get()
        ];
        return view('user_payments.updateuser_payment' ,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_paymentRequest  $request
     * @param  \App\Models\User_payment  $user_payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_paymentRequest $request, User_payment $user_payment)
    {
        // $product->discount_id = $request->input('discount_id');
        $user_payment->user_id =$request['user_id'];
        $user_payment->payment_type =$request['payment_type'];
        $user_payment->provider =$request['provider'];
        $user_payment->account_no =$request['account_no'];
        $user_payment->expiry_date =$request['expiry_date'];

        $user_payment->save();

        (new WorkFlowController)->work_flow('update', 'user_payment');

        return to_route('user_payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_payment  $user_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_payment $user_payment)
    {
        $user_payment->delete();
        (new WorkFlowController)->work_flow('delete', 'user_paymets');
        return to_route('user_payments.index');
    }
}

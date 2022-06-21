<?php

namespace App\Http\Controllers;

use App\Models\User_address;
use App\Http\Requests\StoreUser_addressRequest;
use App\Http\Requests\UpdateUser_addressRequest;
use App\Models\User;

class UserAddressController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_addresses.user_address' ,[
          'user_addresses' => User_address::with('user')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_addresses.adduser_address' , [
            'users' =>User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_addressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_addressRequest $request)
    {
        User_address::create($request->all());
        (new WorkFlowController)->work_flow('create' ,'user_adress');
        return to_route('user_addresses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function show(User_address $user_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function edit(User_address $user_address)
    {
        $data=[
            'user_address'=>$user_address
        ];
        return view('user_addresses.updateuser_address' , $data ,[
            'users' => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_addressRequest  $request
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_addressRequest $request, User_address $user_address)
    {
        $user_address->user_id = $request->input('user_id');
        $user_address->country = $request->input('country');
        $user_address->city = $request->input('city');
        $user_address->postal_code = $request->input('postal_code');
        $user_address->address = $request->input('address');
        $user_address->telephone1 = $request->input('telephone1');
        $user_address->telephone2 = $request->input('telephone2');
        

        
        $user_address->save();
        (new WorkFlowController)->work_flow('update' ,'user_adress');

        return to_route('user_addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_address $user_address)
    {
        $user_address->delete();
        (new WorkFlowController)->work_flow('delete' ,'user_adress');

        return to_route('user_addresses.index');

    }

  
}

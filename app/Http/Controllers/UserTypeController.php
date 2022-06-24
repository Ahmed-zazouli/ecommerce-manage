<?php

namespace App\Http\Controllers;

use App\Models\User_type;
use App\Http\Requests\StoreUser_typeRequest;
use App\Http\Requests\UpdateUser_typeRequest;
use GuzzleHttp\Middleware;

class UserTypeController extends Controller
{
    public function __construct()
    {
        $this->Middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_types.user_type' , [
           'user_types' => User_type::paginate(10) 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_types.adduser_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_typeRequest $request)
    {
        $active = 0;
        if($request['active'] == 'on'){
            $active = 1;
        }
        User_type::create([
            'type' => $request['type'],
            'permission' => $request['permission'],
            'active' => $active
        ]);

        (new WorkFlowController)->work_flow('create' ,'user_types');
        return to_route('user_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function show(User_type $user_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function edit(User_type $user_type)
    {
        $data=[
            'user_type' => $user_type
        ];

        return view('user_types.updateuser_type' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_typeRequest  $request
     * @param  \App\Models\User_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_typeRequest $request, User_type $user_type)
    {
        $user_type->type = $request['type'];
        $user_type->permission = $request['permission'];
        $active = 0;
        if($request['active'] == 'on'){
            $active = 1;
        }
        $user_type->active = $active;

        $user_type->save();
        (new WorkFlowController)->work_flow('update' ,'user_types');
        return to_route('user_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_type $user_type)
    {
        $user_type->delete();
        return to_route('user_types.index');
    }
}

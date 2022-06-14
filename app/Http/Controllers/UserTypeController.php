<?php

namespace App\Http\Controllers;

use App\Models\User_type;
use App\Http\Requests\StoreUser_typeRequest;
use App\Http\Requests\UpdateUser_typeRequest;

class UserTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreUser_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_typeRequest $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_type $user_type)
    {
        //
    }
}

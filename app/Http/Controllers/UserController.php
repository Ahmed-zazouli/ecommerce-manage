<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User_address;
use App\Models\User_type;
use App\Models\Work_flow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        return view('users.user', [
            'users' => User::with('User_type')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.adduser',[
            'types' => User_type::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
         User::create([
            'user_type_id' => $request['user_type_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        (new WorkFlowController)->work_flow('create' ,'users');

       

        //  User::create( $request->all());
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data=[
            'user'=>$user
        ];
        return view('users.updateuser' , $data ,[
            'types' => User_type::get() 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->user_type_id = $request->input('user_type_id');
        $user->email = $request->input('email');

        
        $user->save();
        (new WorkFlowController)->work_flow('update' ,'users');

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete() ;
        (new WorkFlowController)->work_flow('delete' ,'users');

        return to_route('users.index');
    }

   // return the user with he is adress 
    public function my_profile(User $user){

        $user_address = User_address::where ('user_id', $user->id)->get();
        $user_type = User_type::find($user->user_type_id);
        $work_flow = Work_flow::where('user_id' , $user->id)->get();

       // $profile = User::with('User_address')->with('user_type')->where('id', $user->id)->get();
      
        $data=[
             'user' => $user,
             'user_addresses' => $user_address ,
             'user_type' => $user_type ,
             'work_flows' => $work_flow
        ];
       
        // echo "<pre>";
        // print_r($user1) ;
        // echo "</pre>";
         return view('users.profile' ,$data);
    }


    // public function userlogin(Request $request)
    // {
    //    $data = $request->input();
    //    $request->session()->put('user' ,$data['user']);
    //    return to_route('admin');
    // }
}





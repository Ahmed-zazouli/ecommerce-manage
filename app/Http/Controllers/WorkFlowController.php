<?php

namespace App\Http\Controllers;

use App\Models\Work_flow;
use App\Http\Requests\StoreWork_flowRequest;
use App\Http\Requests\UpdateWork_flowRequest;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkFlowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function work_flow($event_name , $event_table){
        // $requestt =array();
        // $requesttevent_name => $event_name;
        // $requestt->event_table => $event_table;
        // $requestt->user_id => Auth::user()->id;

        
        DB::table('work_flows')->insert([
            'event_name' => $event_name,
            'event_table' => $event_table,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d h:i:s')
            
        ]);
        
       // Work_flow::create($request);
        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('work_flow' , [
            'work_flows' => Work_flow::with('user')->get()
        ]);
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
     * @param  \App\Http\Requests\StoreWork_flowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWork_flowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work_flow  $work_flow
     * @return \Illuminate\Http\Response
     */
    public function show(Work_flow $work_flow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work_flow  $work_flow
     * @return \Illuminate\Http\Response
     */
    public function edit(Work_flow $work_flow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWork_flowRequest  $request
     * @param  \App\Models\Work_flow  $work_flow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWork_flowRequest $request, Work_flow $work_flow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work_flow  $work_flow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work_flow $work_flow)
    {
        //
    }
}

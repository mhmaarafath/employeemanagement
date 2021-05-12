<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Session;

class TimeController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateTime = Carbon::now();
        
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if($input['type'] == 'start'){
            $input['start'] = $dateTime;
            $input['end'] = '';
            $input['duration'] = '';
            $data = Time::create($input);
        } else {
            $userLast = Time::where('user_id', Auth::user()->id)->latest()->first();
            $input['start'] = $userLast->start;
            $input['end'] = $dateTime;
            $input['duration'] = gmdate('H:i:s', $dateTime->diffInSeconds($userLast->start));
            $userLast->update($input);
            
        }
        Session::flash('success', 'Time Added Successfully');
        
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        //
    }
}

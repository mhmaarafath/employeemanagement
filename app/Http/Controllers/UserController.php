<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $users = User::where('id', '!=', Auth::user()->id)->get();
        }
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8|max:20',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $data = User::create($input);
        $data->save();

        Session::flash('success','User Added Successfully !');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::user()->role == 'user' && Auth::user()->id != $user->id){
            return redirect()->route('dashboard.index');
        }
        return view('user.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        if(isset($request->update_password)){
            $request->validate([
                'password' => 'required|confirmed|min:8|max:20',
            ]);
            $input['password'] = Hash::make($request->password);
        }
        else{
            $input['password'] = $user->password;
        }

        $user->update($input);
        Session::flash('success','User Edited Successfully !');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function softdelete(User $user)
    {
        $user->delete();
        Session::flash('delete','User Deleted Successfully !');
        return redirect()->route('users.index');
    }

}

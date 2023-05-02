<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function showForm()
    {
        return view('user.form');
    }
    public function checkLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('users')->attempt(['email' => $input['email'],'password'=> $input['password']]))
        {
            Alert::success('Login Successful!');
            return view('user.user_dash');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect('/');
    }
}

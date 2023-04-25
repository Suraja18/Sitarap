<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ClinicController extends Controller
{
    public function showForm()
    {
        return view('clinic.form');
    }
    public function checkLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('clinic')->attempt(['email' => $input['email'],'password'=> $input['password']]))
        {
            return redirect('/');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::guard('clinic')->logout();
        return redirect('/');
    }
}

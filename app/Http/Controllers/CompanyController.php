<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
    public function showForm()
    {
        return view('company.form');
    }
    public function checkLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('company')->attempt(['email' => $input['email'],'password'=> $input['password']]))
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
        Auth::guard('company')->logout();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function showForm()
    {
        return view('admin.form');
    }
    public function checkLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt(['email' => $input['email'],'password'=> $input['password']]))
        {
            return view('admin.admin_dash');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function showAdmin()
    {
        if (Auth::guard('admin'))
        {
            return view('admin.admin_dash');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function companymanage()
    {
        if (Auth::guard('admin'))
        {
            return view('admin.companymanage');
        }
        else
        {
            return redirect()->back();
        }
    }
}

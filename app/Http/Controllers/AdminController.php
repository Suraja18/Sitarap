<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Company;

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
    public function viewcompany()
    {
        if (Auth::guard('admin'))
        {
            $company = company::all();
            return view('admin.viewcompany',compact('company'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function addcompany(Request $request)
    {
        $comp = new company;
        $comp->name=$request->name;
        $comp->email=$request->email;
        $pass=$request->pass;
        $passhash=bcrypt($pass);
        $comp->password=$passhash;
        $comp->save();
        return redirect()->back()->with('message','New Company has been created!!');
    }
    public function delcompany($id)
    {
        $company = company::find($id);
        $company->delete();
        return redirect()->back()->with('message','Company has been Deleted!!');
    }
}

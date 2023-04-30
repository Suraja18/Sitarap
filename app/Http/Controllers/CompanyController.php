<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
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
            return view('company.company_dash');
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
    public function tokenmanage()
    {
        $token = token::all();
        return view('company.tokenmanage',compact('token'));
    }
    public function addtoken(Request $request)
    {
        $token = new token;
        $token->token_code=$request->name;
        $token->save();
        return redirect()->back()->with('message','New Token has been created!!');
    }
    public function deltoken($id)
    {
        $token = token::find($id);
        $token->delete();
        return redirect()->back()->with('message','Token has been Deleted!!');
    }
}

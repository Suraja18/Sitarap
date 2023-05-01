<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Clinic;
use App\Models\User;
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

    public function clinicmanage()
    {
        $comp = Auth::guard('company')->id();
        $token = token::all();
        return view('company.clinicmanage',compact('token','comp'));
    }

    public function addclinic(Request $request)
    {
        $clinic = new clinic;
        $clinic->name=$request->name;
        $clinic->email=$request->email;
        $clinic->token=$request->token;
        $clinic->company_id=$request->company_id;
        $pass=$request->pass;
        $passhash=bcrypt($pass);
        $clinic->password=$passhash;
        $clinic->save();
        return redirect()->back()->with('message','New Clinic has been created!!');
    }

    public function viewclinic()
    {
        $comp_id = Auth::guard('company')->id();
        $clinics = clinic::where('company_id','=',$comp_id)->get();
        return view('company.viewclinic',compact('clinics'));
    }

    public function delclinic($id)
    {
        $clinic = clinic::find($id);
        $clinic->delete();
        return redirect()->back()->with('message','Clinic has been Deleted!!');
    }

    public function usermanage()
    {
        $comp = Auth::guard('company')->id();
        $clinics = clinic::all();
        return view('company.usermanage',compact('clinics','comp'));
    }

    public function adduser(Request $request)
    {
        $user = new user;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->clinic=$request->clinic;
        $user->company_id=$request->company_id;
        $pass=$request->pass;
        $passhash=bcrypt($pass);
        $user->password=$passhash;
        $user->save();
        return redirect()->back()->with('message','New Users has been created!!');
    }

    public function viewuser()
    {
        $comp_id = Auth::guard('company')->id();
        $users = user::where('company_id','=',$comp_id)->get();
        return view('company.viewuser',compact('users'));
    }

    public function deluser($id)
    {
        $users = user::find($id);
        $users->delete();
        return redirect()->back()->with('message','Users has been Deleted!!');
    }
}

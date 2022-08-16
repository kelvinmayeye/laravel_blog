<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.login');
    }

    public function loggin(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $credentials=[
            "email"=>$request->email,
            "password"=>$request->password,
        ];
        
        if(Auth::attempt($credentials, $request->remember)){
            
            return redirect()->intended('dashboard');
        }

        //if credentials didnt match
        Session::flash("fail","sorry wrong usename or password");
        return back();
    }
}

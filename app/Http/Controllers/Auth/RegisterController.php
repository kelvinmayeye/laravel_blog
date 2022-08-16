<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validate request
        $this->validate($request, [
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'email|required|max:255',
            'password'=>'required|confirmed',

        ]);

        //store user
        $user = new User();
        //dd($request->all());
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();

        //signin user
        auth()->attempt($request->only('email','password'));
        //redirect user
        Session::flash("success","New User Added");
        return view('dashboard');
    }
}

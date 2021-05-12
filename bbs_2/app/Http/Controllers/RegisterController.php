<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;


class RegisterController extends Controller
{
 
    public function index(){
        return view('register.create');
    }

    public function store(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        if(sizeof(User::where('email',$email)->get())<1) {
            User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password) ]);
            return redirect() -> route('login.index');
        }else{
            return view('register.create',['error'=>'이미 등록된 email입니다']);
        }
    }


}

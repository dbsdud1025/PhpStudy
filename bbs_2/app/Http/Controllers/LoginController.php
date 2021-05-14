<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Validator;


class LoginController extends Controller{
 
    public function index(){
        return view('login.login');
    }
    
    public function store(Request $request){
        $email = $request -> email;
        $password = $request -> password;
        $credentials = ['email'=>$email,'password'=>$password];

        if(! auth()->attempt($credentials)){    
            return "로그인정보가 정확하지 않습니다.";
        }else{
            $posts= Post::orderBy('created_at', 'desc')->paginate(5);
            $login=auth()->user();
            return view('post.index', compact('posts', 'login'));
           
        }
       
    }
}

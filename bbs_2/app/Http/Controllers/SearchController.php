<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\toString;
use Validator;
use Illuminate\Support\Facades\Storage;


class SearchController extends Controller
{
    
    public function index(Request $request){
        $search = $request->input('search');
        
        $posts = DB::table('posts')->where('title','LIKE','%'.$search.'%')->Paginate(5)->get();
        
        $login=auth()->user();
        
        return View('post.search', compact('posts', 'login','search'));
    }
    public function store(Request $request){
        $search = $request->input('search');
       
        $posts = DB::table('posts')->where('title','LIKE','%'.$search.'%')->Paginate(1);
        
        $login=auth()->user();
    
        return View('post.search', compact('posts', 'login','search'));
    }

    

    
}

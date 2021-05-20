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
        $posts= DB::select("select * from posts where title LIKE ? ", [$search]);
        $login=auth()->user();
        
        return view('post.search', compact('posts', 'login','search'));
    
    }
    public function store(Request $request){
        $search = $request->input('search');
        //$posts= DB::select("select * from posts where title LIKE ? ", [$search]);
        $posts = DB::table('posts')->where('title','LIKE',$search)
        ->get();
        $login=auth()->user();
        
        return view('post.search', compact('posts', 'login','search'));
        }

    

    
}

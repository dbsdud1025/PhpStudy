<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Validator;


class PostController extends Controller
{
    public function index(){
            $posts= Post::all();
            $login=auth()->user();
            return view('post.index', compact('posts', 'login'));
        
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){

        $post=new Post;
        $login=auth()->user();
        $post->title= $request->input('title');
        $post->body = $request->input('body');
        $post->thumbnail=$login->name;

        $post->save();
        return redirect() -> route('post.index');

    }

    public function show($id){
        $posts = Post::findOrFail($id);
        return view('post.show', compact('posts'));
    }

    public function edit($id){
        $posts = Post::findOrFail($id);
        return view('post.edit', compact('posts'));
    }

    public function update($id,Request $request){
        $posts = Post::findOrFail($id);

        $validator = Validator::make($data= $request->all(), Post::$rules);
        if ($validator->fails())
        {
            return redirect() ->back()->withErrors($validator)->withInput();
        }
        $posts->update($data);
        return redirect() -> route('post.index');
    }

    public function destroy($id){
        Post::destroy($id);
        return redirect() -> route('post.index');
    }
}

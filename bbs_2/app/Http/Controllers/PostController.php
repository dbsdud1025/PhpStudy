<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index(){
            $posts= Post::orderBy('created_at', 'desc')->paginate(5);
            $login=auth()->user();
            return view('post.index', compact('posts', 'login'));
        
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){

        $validator = Validator::make($data= $request->all(), Post::$rules);
        if ($validator->fails())
        {
            return redirect() ->back()->withErrors($validator)->withInput();
        }
        $post=new Post;

        if($request->hasFile('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $newFileName=time().'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move(storage_path().'/files/',$newFileName);
            $post-> thumbnail=$newFileName;
        }

        
        $login=auth()->user();
        $post->title= $request->input('title');
        $post->body = $request->input('body');
        $post->username=$login->name;

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
        //id로 경로 찾아서 파잉ㄹ까지
    }

    
}

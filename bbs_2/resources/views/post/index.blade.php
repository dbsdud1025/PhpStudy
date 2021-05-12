@extends('layouts.master')
@section('content')
<h1>All Posts</h1>
<a>{{$login -> name}}님</a><h5>안녕하세요^^</h5>
<ul class="list-group">
    @foreach($posts as $post)
        <li class="list-group-item">
 
        <a href="{{ route('post.show', $post -> id) }}"> {{$post -> title}}</a>
        <div class="list-group-item-item" style="font-size:xx-small">{{$post->thumbnail}}</div>
        </li>
        
    @endforeach
</ul>

<h3>
    <a href="{{ route('post.create')}}" class="btn btn-primary"> 글 작성 </a>
    <br><br>
    <a href="{{ route('login.index')}}" class="btn btn-primary"> 로그아웃 </a>
</h3>
@stop
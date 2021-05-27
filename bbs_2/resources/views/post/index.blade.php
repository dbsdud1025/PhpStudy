@extends('layouts.master')
@section('content')
<h1>All Posts </h1>
<a>{{$login -> name}}님</a><h5>안녕하세요^^</h5>
<form method="post" action="{{route('search.index')}}">
{{ csrf_field() }}
    <input type="text" class="form-control" name = 'search'
      value=""/>
    <div class ="form-group">
     <input type="submit" value="검색" class="btn btn-primary">
    </div>
</form>
        <br><br>
</form>
<ul class="list-group">
    @foreach($posts as $post)
        <li class="list-group-item">
 
        <a href="{{ route('post.show', $post -> id) }}"> {{$post -> title}}</a>
        <div class="list-group-item-item" style="font-size:xx-small">{{$post->username}}</div>
        </li>
        
    @endforeach
</ul>

<div class="text-center">
{!! $posts->render() !!}
</div>


<h3>
    <a href="{{ route('post.create')}}" class="btn btn-primary"> 글 작성 </a>
    <br><br>
    <a href="{{ route('login.index')}}" class="btn btn-primary"> 로그아웃 </a>
</h3>
@stop
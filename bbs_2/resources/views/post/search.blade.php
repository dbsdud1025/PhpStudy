@extends('layouts.master')
@section('content')
<h1>검색 결과 </h1>
<a>{{$login -> name}}님</a><h5>검색결과</h5>
<input type="text" class="form-control" name = 'search'/>
<a href="{{ route('search.index')}}" class="btn btn-primary"> 검색 </a>
    <br><br>
    {{$search}}
<ul class="list-group">
    @foreach($posts as $post)
    
        <li class="list-group-item">
 
        <a href="{{ route('post.show', $post -> id) }}"> {{$post -> title}}</a>
        <div class="list-group-item-item" style="font-size:xx-small">{{$post->username}}</div>
        </li>
        
    @endforeach
</ul>

@stop
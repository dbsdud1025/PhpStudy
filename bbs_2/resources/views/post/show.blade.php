@extends('layouts.master')
@section('content')

<h1>{{$posts -> title}}...</h1>

<article>{{$posts -> body}}</article>
<a href="{{ url('/download/123?img='.$posts -> thumbnail.'&img2='.$posts -> thumbnail)}}">{{$posts -> thumbnail}}</a>

<br>
<h8>작성자 : {{$posts -> username}}</h8>
<br><br>
<a href="{{ route('post.edit', $posts -> id )}}" class="btn btn-primary"> 글 수정 </a>
<br><br>
<form method="POST" action="{{ route('post.destroy', $posts -> id)}}">
@method('DELETE')
@csrf
<button type="submit" class="btn btn-primary">글 삭제</button>
</form>
<br><br>
<a href="{{ route('post.index', $posts -> id)}}" class="btn btn-primary"> 목록 </a>
@stop


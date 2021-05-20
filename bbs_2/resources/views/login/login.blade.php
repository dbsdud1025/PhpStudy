@extends('layouts.master')

@section('content')
<h1>로그인</h1>
<form method="post" action ="{{route('login.store')}}" enctype="multipart/form-data">
@csrf
<div>
<td>
email
<input type="text" class="form-control" name = 'email'/>
</td><br>
<td>
password
<input type="password" class="form-control" name = 'password'/>
</td><br><br>
</div>
<button type="submit" class="btn btn-primary">로그인</button>
</form>
<br>
<br>
<a href="{{ url('/social/kakao')}}">카카오톡</a>으로 로그인<br><br>
<a href="{{ url('/social/google')}}">구글로 </a>로그인<br><br>
<a href="{{ url('/social/facebook')}}">페이스북</a>으로 로그인<br><br>
<a href="{{url('/social/naver')}}">네이버</a>로 로그인<br><br>
<br>
<a href="{{ route('register.index')}}" class="btn btn-primary">회원가입</a>
@stop
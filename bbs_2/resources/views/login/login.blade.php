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
<a href="{{ route('register.index')}}" class="btn btn-primary">회원가입</a>
@stop
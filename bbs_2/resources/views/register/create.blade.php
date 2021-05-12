@extends('layouts.master')

@section('content')
<h1>회원가입</h1>
<form method="post" action="{{route('register.store')}}" enctype="multipart/form-data">
@csrf
<div>
<td> name
<input type="text" class="form-control" name = 'name'/>
</td><br>
<td> email
<input type="text" class="form-control" name = 'email'/>
</td><br>
<td>
password
<input type="password" class="form-control" name = 'password'/> </td><br>
<br> </div>
<button type="submit" class="btn btn-primary">회원가입</button>
</form>
@stop
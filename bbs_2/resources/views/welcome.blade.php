<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
    </head>
    <body>
    @if (Auth::user())
    <h2>{{Auth::user()['name']}}님 환영합니다.</h2>
    <a href="/auth/logout">로그아웃하기</a>

    @else
    <h2>로그인이 필요합니다.</h2>
    <a href="/social/naver">네이버로 로그인하기</a><div>
    <a href="/social/kakao">카카오로 로그인하기</a>
    @endif

       
    </body>
</html>

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/register','App\Http\Controllers\RegisterController');

Route::resource('/login','App\Http\Controllers\LoginController');

Route::resource('/post','App\Http\Controllers\PostController');

Route::get('/download/123', function ($originFileName, $saveFileName) {

    $originFileName = base64_decode($originFileName);
 
    $saveFileName = storage_path().base64_decode($saveFileName);
 
    return response()->download($saveFileName, $originFileName);
 
 });

Route::resource('/search','App\Http\Controllers\SearchController');

Route::get('/auth/logout', 'App\Http\Controllers\HomeController@getLogout');
Route::get('/social/{provider}', 'App\Http\Controllers\SocialController@redirectToProvider');
Route::get('/social/{provider}/callback', 'App\Http\Controllers\SocialController@handleProviderCallback');






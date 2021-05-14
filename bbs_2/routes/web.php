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

Route::get('/download/{originFilename}/{saveFilename}', function ($originFileName, $saveFileName) {

    $originFileName = base64_decode($originFileName);
 
    $saveFileName = storage_path().base64_decode($saveFileName);
 
    return response()->download($saveFileName, $originFileName);
 
 });

 Route::resource('/search','App\Http\Controllers\SearchController');


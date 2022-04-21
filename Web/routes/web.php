<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
Route::get('timkiem', 'App\Http\Controllers\HomeController@search'); 
Route::get('maxprice', 'App\Http\Controllers\HomeController@max'); 
Route::get('minprice', 'App\Http\Controllers\HomeController@min');
Route::get('khoanggia', 'App\Http\Controllers\HomeController@khoanggia'); 
Route::get('bieudo', 'App\Http\Controllers\HomeController@bieudo'); 


Route::get('bar', 'App\Http\Controllers\HomeController@bar'); 







Route::get('sendo', 'App\Http\Controllers\HomeController@sendo');
Route::get('tiki', 'App\Http\Controllers\HomeController@tiki'); 
Route::get('shoppe', 'App\Http\Controllers\HomeController@shoppe'); 
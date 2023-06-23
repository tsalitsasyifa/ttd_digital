<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/division',DivisionController::class)->middleware('auth');
Route::get('/division/destroy/{division_id}','App\Http\Controllers\DivisionController@destroy');

Route::resource('/user',UserController::class)->middleware('auth');
Route::get('/user/destroy/{user_id}','App\Http\Controllers\UserController@destroy');

Route::resource('/document',DocumentController::class)->middleware('auth');

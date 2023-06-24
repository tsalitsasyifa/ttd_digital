<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ApprovalController;
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
Route::get('/division/destroy/{division_id}','App\Http\Controllers\DivisionController@destroy')->middleware('auth');

Route::resource('/user',UserController::class)->middleware('auth');
Route::get('/user/destroy/{user_id}','App\Http\Controllers\UserController@destroy')->middleware('auth');

Route::resource('/document',DocumentController::class)->middleware('auth');

Route::resource('/approval',ApprovalController::class)->middleware('auth');
Route::get('/approval/approve/{document_id}','App\Http\Controllers\ApprovalController@approve')->middleware('auth');
Route::get('/approval/download/{document_id}', 'App\Http\Controllers\ApprovalController@downloadFile')->middleware('auth');
Route::post('/approval/newApproval', 'App\Http\Controllers\ApprovalController@newApproval')->middleware('auth')->name('approval.newApproval');


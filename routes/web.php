<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DocumentTrackingController;
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
Route::post('/approval/approve/{document_id}','App\Http\Controllers\ApprovalController@approve')->middleware('auth');
Route::get('/approval/download/{document_id}', 'App\Http\Controllers\ApprovalController@downloadFile')->middleware('auth');
Route::post('/approval/newApproval', 'App\Http\Controllers\ApprovalController@newApproval')->middleware('auth')->name('approval.newApproval');
Route::get('/linkqr/{document_id}', 'App\Http\Controllers\ApprovalController@linkqr')->name('detailqr');
Route::get('/approval/tolak/{document_id}','App\Http\Controllers\ApprovalController@tolak')->middleware('auth');
Route::post('/approval/revisi/{document_id}','App\Http\Controllers\ApprovalController@revisi')->middleware('auth');

Route::get('/tracking','App\Http\Controllers\DocumentTrackingController@index')->name('tracking.index')->middleware('auth');
Route::get('/tracking/detail/{document_id}','App\Http\Controllers\DocumentTrackingController@detail')->name('tracking.detail')->middleware('auth');
Route::get('/tracking/tertunda','App\Http\Controllers\DocumentTrackingController@tunda')->name('tracking.tertunda')->middleware('auth');

Route::get('/tracking/destroy/{document_id}','App\Http\Controllers\DocumentTrackingController@destroy')->name('tracking.destroy')->middleware('auth');

Route::get('/ttd', [ApprovalController::class, 'ttd']);
Route::post('/simpan_ttd', [ApprovalController::class, 'simpan_ttd'])->name('simpan_ttd');
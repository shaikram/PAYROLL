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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('login', 'App\Http\Controllers\mainController@login');
Route::get('logout', 'App\Http\Controllers\mainController@logout');
Route::get('/', 'App\Http\Controllers\mainController@home');
Route::get('profile', 'App\Http\Controllers\mainController@profile');
Route::get('services', 'App\Http\Controllers\mainController@services');
Route::get('equipment', 'App\Http\Controllers\mainController@equipment');
Route::get('client', 'App\Http\Controllers\mainController@client');
Route::get('management', 'App\Http\Controllers\mainController@management');
Route::get('gallery', 'App\Http\Controllers\mainController@gallery');
Route::post('checklogin', 'App\Http\Controllers\mainController@checkLogin');
Route::get('admin', 'App\Http\Controllers\mainController@admin');

// ======Dashboard Routes=============== //
Route::get('admin/gallery', 'App\Http\Controllers\dashboardController@gallery');
Route::get('admin/logout', 'App\Http\Controllers\dashboardController@logout');
Route::post('admin/upload-photo', 'App\Http\Controllers\galleryController@store');
Route::get('admin/add-member', 'App\Http\Controllers\dashboardController@addMember');
Route::post('admin/member-store', 'App\Http\Controllers\addMemberController@store');

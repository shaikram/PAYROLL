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
    return view('index');
});
Route::get('profile', function () {
    return view('profile');
});
Route::get('services', function () {
    return view('services');
});
Route::get('equipment', function () {
    return view('equipment');
});
Route::get('client', function () {
    return view('client');
});
Route::get('management', function () {
    return view('management');
});
Route::get('gallery', function () {
    return view('gallery');
});

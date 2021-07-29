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

Route::get('result/{id}', 'App\Http\Controllers\mainController@result');
Route::post('search', 'App\Http\Controllers\mainController@search');
Route::get('services', 'App\Http\Controllers\mainController@services');
Route::get('equipment', 'App\Http\Controllers\mainController@equipment');
Route::get('clients', 'App\Http\Controllers\mainController@client');
Route::get('management', 'App\Http\Controllers\mainController@management');
Route::get('gallery', 'App\Http\Controllers\mainController@gallery');
Route::post('checklogin', 'App\Http\Controllers\mainController@checkLogin');
Route::get('admin', 'App\Http\Controllers\mainController@admin');
Route::get('user-profile', 'App\Http\Controllers\mainController@userProfile');
Route::get('edit-profile', 'App\Http\Controllers\mainController@editUser');
Route::post('message-store', 'App\Http\Controllers\messageController@store');
Route::get('messages', 'App\Http\Controllers\messageController@index');

// ======Dashboard Routes=============== //
Route::get('admin/gallery', 'App\Http\Controllers\dashboardController@gallery');
Route::get('admin/logout', 'App\Http\Controllers\dashboardController@logout');
Route::post('admin/upload-photo', 'App\Http\Controllers\galleryController@store');
Route::get('admin/add-member', 'App\Http\Controllers\dashboardController@addMember');

Route::get('admin/admin-pass', 'App\Http\Controllers\dashboardController@password');
Route::post('admin/confirm-pass', 'App\Http\Controllers\addMemberController@confirmPass');
Route::post('admin/change-pass', 'App\Http\Controllers\addMemberController@changePass');

Route::post('admin/member-store', 'App\Http\Controllers\addMemberController@store');

Route::post('member-update', 'App\Http\Controllers\addMemberController@update');
Route::get('admin/member-list', 'App\Http\Controllers\dashboardController@memberList');
Route::get('admin/{id}/member-profile', 'App\Http\Controllers\dashboardController@profile');
Route::post('change-image', 'App\Http\Controllers\addMemberController@changePhoto');
Route::post('change-status', 'App\Http\Controllers\addMemberController@changeStatus');
Route::get('admin/add-employee', 'App\Http\Controllers\dashboardController@addemployee');
Route::post('admin/employee-store', 'App\Http\Controllers\employeeController@store');
Route::get('admin/employee-list', 'App\Http\Controllers\employeeController@employeerList');
Route::get('admin/{id}/employee-profile', 'App\Http\Controllers\employeeController@profile');
Route::get('admin/{id}/employee-salary', 'App\Http\Controllers\employeeController@salary');
Route::get('admin/{id}/edit-profile', 'App\Http\Controllers\employeeController@editProfile');
Route::post('admin/edit/profile-modify', 'App\Http\Controllers\employeeController@updateProfile');
Route::get('admin/add-client', 'App\Http\Controllers\dashboardController@addClient');
Route::post('admin/upload-client', 'App\Http\Controllers\clientController@store');
Route::get('admin/{id}/client-profile', 'App\Http\Controllers\clientController@profile');
Route::post('admin/change-photo', 'App\Http\Controllers\clientController@changePhoto');
Route::get('admin/{id}/edit-client', 'App\Http\Controllers\clientController@editClient');
Route::post('admin/client-update', 'App\Http\Controllers\clientController@update');
Route::get('admin/add-payroll', 'App\Http\Controllers\dashboardController@addPayroll');
Route::post('admin/posting', 'App\Http\Controllers\dashboardController@posting');
Route::post('admin/create-posting', 'App\Http\Controllers\payrollController@store');
Route::get('admin/{id}/payroll', 'App\Http\Controllers\payrollController@payroll');

// =======MESSAGES======================//
Route::get('messages/{id}', 'App\Http\Controllers\messageController@viewr');
Route::get('messages/{id}/{userId}', 'App\Http\Controllers\messageController@viewu');
Route::post('reply-store', 'App\Http\Controllers\messageController@replyStore');
Route::post('showReply', 'App\Http\Controllers\messageController@showInbox');

// ===============PAYROLL======================= //
Route::post('admin/save-payroll', 'App\Http\Controllers\payrollController@savePayroll');
Route::get('admin/{id}/{from}/{to}/payroll-generate', 'App\Http\Controllers\payrollController@generate');























                                                                                                                                                                            //

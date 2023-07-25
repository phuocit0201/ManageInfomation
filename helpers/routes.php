<?php
use Libraries\Facades\Route;
Route::get('/', 'Home', 'index');

Route::get('admin/login', 'LoginAdmin','index')->name('login');
Route::post('admin/login', 'LoginAdmin', 'authentication')->name('login');
Route::get('admin/logout', 'Logout', 'logoutAdmin')->name('vip');
Route::get('admin/logout', 'Logout', 'logoutAdmin')->name('aa');

Route::get('admin', 'Dashboard', 'home')->middleware('AdminAuth')->name('abc');

Route::get('admin/profile-type', 'ProfileType', 'index')->middleware(['AdminAuth'])->name('home');
Route::post('admin/profile-type/store', 'ProfileType', 'storeProfileType')->middleware(['AdminAuth', 'Authorization']);
Route::get('admin/profile-type/show', 'ProfileType', 'showProfileType');
Route::post('admin/profile-type/update', 'ProfileType', 'updateProfileType');
Route::post('admin/profile-type/delete', 'ProfileType', 'deleteProfileType');


Route::get('nhap-thong-tin-ho-so', 'Home', 'store');
Route::post('nhap-thong-tin-ho-so', 'Home', 'store');
Route::get('tra-cuu-thong-tin', 'home', 'search');



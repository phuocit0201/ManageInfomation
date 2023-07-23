<?php
use Libraries\Facades\Route;
Route::get('/', 'Home', 'index');

Route::get('admin/login', 'LoginAdmin','index', 'AdminGuest');
Route::post('admin/handle-login', 'LoginAdmin', 'authentication', 'AdminGuest');
Route::get('admin/logout', 'Logout', 'logoutAdmin', 'AdminAuth');
Route::get('admin/logout', 'Logout', 'logoutAdmin', 'AdminAuth');

Route::get('admin', 'Dashboard', 'home', 'AdminAuth');

Route::get('admin/profile-type', 'ProfileType', 'index', 'AdminAuth');
Route::post('admin/profile-type/store', 'ProfileType', 'storeProfileType', 'AdminAuth');
Route::get('admin/profile-type/show', 'ProfileType', 'showProfileType', 'AdminAuth');
Route::post('admin/profile-type/update', 'ProfileType', 'updateProfileType', 'AdminAuth');
Route::post('admin/profile-type/delete', 'ProfileType', 'deleteProfileType', 'AdminAuth');


Route::get('nhap-thong-tin-ho-so', 'Home', 'store');
Route::post('nhap-thong-tin-ho-so', 'Home', 'store');
Route::get('tra-cuu-thong-tin', 'home', 'search');

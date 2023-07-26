<?php
use Libraries\Facades\Route;

use Controllers\LoginAdmin;
use Controllers\Home;
use Controllers\ProfileType;
use Controllers\Logout;
use Controllers\Dashboard;


use Middleware\AdminAuth;
Route::get('/', Home::class, 'index');

Route::get('admin/login', LoginAdmin::class,'index')->name('admin.login');
Route::post('admin/login', LoginAdmin::class, 'authentication');
Route::get('admin/logout', Logout::class, 'logoutAdmin')->middleware(AdminAuth::class)->name('admin.logout');

Route::get('admin', Dashboard::class, 'home')->middleware(AdminAuth::class)->name('admin.home');

Route::get('admin/profile-type', ProfileType::class, 'index')->middleware(AdminAuth::class)->name('admin.profile_type');
Route::post('admin/profile-type/store', ProfileType::class, 'storeProfileType')->middleware(AdminAuth::class);
Route::get('admin/profile-type/show', ProfileType::class, 'showProfileType')->middleware(AdminAuth::class);
Route::post('admin/profile-type/update', ProfileType::class, 'updateProfileType')->middleware(AdminAuth::class);
Route::post('admin/profile-type/delete', ProfileType::class, 'deleteProfileType')->middleware(AdminAuth::class);


Route::get('nhap-thong-tin-ho-so', Home::class, 'create')->name('enter_profile');
Route::post('nhap-thong-tin-ho-so', Home::class, 'store');
Route::get('tra-cuu-thong-tin', Home::class, 'search')->name('search_profile');



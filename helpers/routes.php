<?php

use Controllers\ContactMethod;
use Libraries\Facades\Route;

use Controllers\Authentication;
use Controllers\Branch;
use Controllers\Home;
use Controllers\ProfileType;
use Controllers\Dashboard;
use Controllers\Organization;
use Controllers\ProfileInfomation;
use Controllers\ReturnProfile;
use Controllers\Invoice;
use Controllers\ReceivePerson;
use Controllers\Certificate;
use Controllers\Search;
use Middleware\AdminAuth;
use Middleware\AdminGuest;
use Controllers\SumLink;


Route::get('/', Home::class, 'index');

Route::get('admin/login', Authentication::class,'index')->middleware(AdminGuest::class)->name('admin.login');
Route::post('admin/login', Authentication::class, 'authentication');
Route::get('admin/logout', Authentication::class, 'logout')->middleware(AdminAuth::class)->name('admin.logout');
Route::get('admin/change-password', Authentication::class, 'changePassword')->middleware(AdminAuth::class)->name('admin.change_password');
Route::post('admin/change-password', Authentication::class, 'handleChangePassword')->middleware(AdminAuth::class);

Route::get('admin', Dashboard::class, 'home')->middleware(AdminAuth::class)->name('admin.dashboard');

Route::get('admin/profile-type', ProfileType::class, 'index')->middleware(AdminAuth::class)->name('admin.profile_type');
Route::post('admin/profile-type/store', ProfileType::class, 'storeProfileType')->middleware(AdminAuth::class);
Route::get('admin/profile-type/show', ProfileType::class, 'showProfileType')->middleware(AdminAuth::class);
Route::post('admin/profile-type/update', ProfileType::class, 'updateProfileType')->middleware(AdminAuth::class);
Route::post('admin/profile-type/delete', ProfileType::class, 'deleteProfileType')->middleware(AdminAuth::class);

Route::get('admin/receive-persons', ReceivePerson::class, 'index')->middleware(AdminAuth::class)->name('admin.receive_persons');
Route::post('admin/receive-persons/store', ReceivePerson::class, 'store')->middleware(AdminAuth::class)->name('admin.receive_persons_store');
Route::get('admin/receive-persons/show', ReceivePerson::class, 'show')->middleware(AdminAuth::class)->name('admin.receive_persons_show');
Route::post('admin/receive-persons/update', ReceivePerson::class, 'update')->middleware(AdminAuth::class)->name('admin.receive_persons_update');
Route::post('admin/receive-persons/delete', ReceivePerson::class, 'delete')->middleware(AdminAuth::class)->name('admin.receive_persons_delete');

Route::get('admin/contact-methods', ContactMethod::class, 'index')->middleware(AdminAuth::class)->name('admin.contact_methods');
Route::post('admin/contact-methods/store', ContactMethod::class, 'store')->middleware(AdminAuth::class)->name('admin.contact_methods_store');
Route::get('admin/contact-methods/show', ContactMethod::class, 'show')->middleware(AdminAuth::class)->name('admin.contact_methods_show');
Route::post('admin/contact-methods/update', ContactMethod::class, 'update')->middleware(AdminAuth::class)->name('admin.contact_methods_update');
Route::post('admin/contact-methods/delete', ContactMethod::class, 'delete')->middleware(AdminAuth::class)->name('admin.contact_methods_delete');

Route::get('admin/organizations', Organization::class, 'index')->middleware(AdminAuth::class)->name('admin.organizations');
Route::post('admin/organizations/store', Organization::class, 'store')->middleware(AdminAuth::class)->name('admin.organizations_store');
Route::get('admin/organizations/show', Organization::class, 'show')->middleware(AdminAuth::class)->name('admin.organizations_show');
Route::post('admin/organizations/update', Organization::class, 'update')->middleware(AdminAuth::class)->name('admin.organizations_update');
Route::post('admin/organizations/delete', Organization::class, 'delete')->middleware(AdminAuth::class)->name('admin.organizations_delete');

Route::get('admin/branches', Branch::class, 'index')->middleware(AdminAuth::class)->name('admin.branches');
Route::post('admin/branches/store', Branch::class, 'store')->middleware(AdminAuth::class)->name('admin.branches_store');
Route::get('admin/branches/show', Branch::class, 'show')->middleware(AdminAuth::class)->name('admin.branches_show');
Route::post('admin/branches/update', Branch::class, 'update')->middleware(AdminAuth::class)->name('admin.branches_update');
Route::post('admin/branches/delete', Branch::class, 'delete')->middleware(AdminAuth::class)->name('admin.branches_delete');

Route::get('admin/profile-infomations', ProfileInfomation::class, 'index')->middleware(AdminAuth::class)->name('admin.profile_infomation');
Route::post('admin/profile-infomations/store', ProfileInfomation::class, 'store')->middleware(AdminAuth::class)->name('admin.profile_infomation_store');
Route::get('admin/profile-infomations/show', ProfileInfomation::class, 'show')->middleware(AdminAuth::class)->name('admin.profile_infomation_show');
Route::get('admin/profile-infomations/edit', ProfileInfomation::class, 'edit')->middleware(AdminAuth::class)->name('admin.profile_infomation_edit');
Route::post('admin/profile-infomations/edit', ProfileInfomation::class, 'update')->middleware(AdminAuth::class)->name('admin.profile_infomation_update');
Route::post('admin/profile-infomations/delete', ProfileInfomation::class, 'delete')->middleware(AdminAuth::class)->name('admin.profile_infomation_delete');
Route::post('admin/profile-infomations/export-excel', ProfileInfomation::class, 'exportExcel')->middleware(AdminAuth::class)->name('admin.profile_infomation_export_excel');

Route::get('nhap-thong-tin-ho-so', Home::class, 'create')->name('enter_profile');
Route::post('nhap-thong-tin-ho-so', Home::class, 'store');
Route::get('tra-cuu-thong-tin', Home::class, 'search')->name('search_profile');

Route::get('admin/certificate', Certificate::class, 'index')->middleware(AdminAuth::class)->name('admin.certificate');
Route::post('admin/certificate/store', Certificate::class, 'store')->middleware(AdminAuth::class)->name('admin.certificate_store');
Route::get('admin/certificate/show', Certificate::class, 'show')->middleware(AdminAuth::class)->name('admin.certificate_show');
Route::post('admin/certificate/update', Certificate::class, 'update')->middleware(AdminAuth::class)->name('admin.certificate_update');
Route::post('admin/certificate/delete', Certificate::class, 'delete')->middleware(AdminAuth::class)->name('admin.certificate_delete');

Route::get('admin/return-profile', ReturnProfile::class, 'index')->middleware(AdminAuth::class)->name('admin.return-profile');
Route::get('admin/return-profile/show', ReturnProfile::class, 'show')->middleware(AdminAuth::class)->name('admin.return-profile_show');
Route::get('admin/return-profile/edit', ReturnProfile::class, 'edit')->middleware(AdminAuth::class)->name('admin.return-profile_edit');
Route::post('admin/return-profile/edit', ReturnProfile::class, 'update')->middleware(AdminAuth::class);
Route::post('admin/return-profile/delete', ReturnProfile::class, 'delete')->middleware(AdminAuth::class)->name('admin.return-profile_delete');
Route::post('admin/return-profile/export-excel', ReturnProfile::class, 'exportExcel')->middleware(AdminAuth::class)->name('admin.return-profile_export_excel');
Route::get('admin/return-profile/create', ReturnProfile::class, 'create')->middleware(AdminAuth::class)->name('admin.return-profile-create');
Route::post('admin/return-profile/create', ReturnProfile::class, 'store')->middleware(AdminAuth::class);

Route::get('admin/invoice', Invoice::class, 'index')->middleware(AdminAuth::class)->name('admin.invoice');
Route::get('admin/invoice/show', Invoice::class, 'show')->middleware(AdminAuth::class)->name('admin.invoice_show');
Route::get('admin/invoice/edit', Invoice::class, 'edit')->middleware(AdminAuth::class)->name('admin.invoice_edit');
Route::post('admin/invoice/edit', Invoice::class, 'update')->middleware(AdminAuth::class);
Route::post('admin/invoice/delete', Invoice::class, 'delete')->middleware(AdminAuth::class)->name('admin.invoice_delete');
Route::post('admin/invoice/export-excel', Invoice::class, 'exportExcel')->middleware(AdminAuth::class)->name('admin.invoice_export_excel');
Route::get('admin/invoice/create', Invoice::class, 'create')->middleware(AdminAuth::class)->name('admin.invoice-create');
Route::post('admin/invoice/create', Invoice::class, 'store')->middleware(AdminAuth::class);
Route::get('admin/invoice/print', Invoice::class, 'printInvoice')->middleware(AdminAuth::class)->name('admin.invoice_print');



Route::get('admin/sum-link', SumLink::class, 'index')->middleware(AdminAuth::class)->name('admin.sum_link');

Route::get('admin/search', Search::class, 'index')->middleware(AdminAuth::class)->name('admin.search');
Route::get('admin/search/show', Search::class, 'show')->middleware(AdminAuth::class)->name('admin.search_show');


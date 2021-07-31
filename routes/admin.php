<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\ForumAdminController;
use App\Http\Controllers\Admin\ReportAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth' , 'admin'])->group(function () {
Route::get('/admin',[ AdminController::class , 'homepage' ])
->name('admin.homepage');

Route::get('/admin/categories',[ CategoryAdminController::class , 'index'])
->name('admin.category.index');
//check***
Route::post('/admin/categories/add', [CategoryAdminController::class , 'add'])
->name('admin.category.add');
//check***

Route::get('/admin/categories/{id}/edit', [CategoryAdminController::class , 'edit'])
->name('admin.category.edit');

Route::get('/admin/categories/{id}/delete', [CategoryAdminController::class , 'delete'])
->name('admin.category.delete');

Route::get('/admin/forums', [ForumAdminController::class , 'index'])
->name('admin.forums.index');

Route::get('/admin/reports', [ReportAdminController::class , 'index'])
->name('admin.reports.index');

Route::get('/admin/reports/{id}', [ReportAdminController::class , 'show'])
->name('admin.reports.show');

Route::get('/admin/{id}/delete', [ReportAdminController::class , 'delete'])
->name('admin.reports.delete');

Route::get('/admin/{id}/close', [ReportAdminController::class , 'close'])
->name('admin.reports.close');


Route::get('/admin/users', [UserAdminController::class , 'index'])
->name('admin.users.index');

Route::get('/admin/users/{slug}',[ UserAdminController::class , 'details'])
->name('admin.users.details');

Route::get('/admin/users/{slug}/reset', [UserAdminController::class , 'reset'])
->name('admin.users.reset');

Route::get('/admin/users/{slug}/delete', [UserAdminController::class , 'delete'])
->name('admin.users.delete');


});


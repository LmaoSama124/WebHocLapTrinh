<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\IndexController ;

// Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');
Route::get('/admin/tableUser', [DashboardController::class, 'tableUser'])->name('admin.tableUser');
Route::get('/admin/createUser', [DashboardController::class, 'createUser'])->name('admin.createUser');

// User
Route::get('/user/course', [IndexController::class, 'course'])->name('user.course');
Route::get('/user/course-detail', [IndexController::class, 'course_detail'])->name('user.themes.course.course-detail');
Route::get('/user/index', [IndexController::class, 'indexuser'])->name('user.index');

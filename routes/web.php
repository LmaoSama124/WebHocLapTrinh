<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\IndexController ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/user/course', [IndexController::class, 'course'])->name('user.course');
Route::get('/user/index', [IndexController::class, 'indexuser'])->name('user.index');
Route::get('/user/course-detail', [IndexController::class, 'course_detail'])->name('user.themes.course.course-detail');
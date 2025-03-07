<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\IndexController ;
use App\Http\Controllers\User\LoginController;

// Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');

// User
Route::get('/user/course', [IndexController::class, 'course'])->name('user.course');
Route::get('/user/course-detail', [IndexController::class, 'course_detail'])->name('user.themes.course.course-detail');
Route::get('/user/enrolled-courses', [IndexController::class, 'course_enrolled'])->name('user.themes.course.enrolled-courses');
Route::get('/user/index', [IndexController::class, 'indexuser'])->name('user.index');
Route::get('/user/course-payment', [IndexController::class, 'course_payment'])->name('user.themes.course.course-payment');
Route::get('/user/login', [IndexController::class, 'login'])->name('user.themes.login.login');

//Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'showRegisterForm']);
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
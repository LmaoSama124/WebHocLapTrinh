<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');
Route::get('/admin/tableUser', [DashboardController::class, 'tableUser'])->name('admin.tableUser');
Route::get('/admin/createUser', [DashboardController::class, 'createUser'])->name('admin.createUser');

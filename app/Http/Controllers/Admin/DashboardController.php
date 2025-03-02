<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.themes.dashboard');
    }

    public function login() {
        return view('admin.themes.login');
    }
}
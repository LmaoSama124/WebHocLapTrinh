<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.themes.dashboard');
    }

    public function login()
    {
        return view('admin.themes.login');
    }

    public function tableUser()
    {
        $users = User::all();
        return view('admin.themes.users.tableUser', compact('users'));
    }

    public function createUser()
    {
        return view('admin.themes.users.createUser');
    }
}
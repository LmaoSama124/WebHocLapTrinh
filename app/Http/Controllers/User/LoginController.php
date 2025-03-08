<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Hiển thị trang đăng nhập
    public function showLoginForm()
    {
        return view('user.themes.login.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/user/index'); 
        }

        return back()->withErrors(['username' => 'Tên đăng nhập hoặc mật khẩu không chính xác']);
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:200',
            'displayname' => 'required|string|max:150',
            'username' => 'required|string|max:200|unique:tbl_users,username',
            'email' => 'required|string|email|max:200|unique:tbl_users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'displayname' => $request->displayname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/user/index');
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
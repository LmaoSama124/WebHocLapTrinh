<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập / đăng ký
    public function index()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('home');
        } else {
            return back()->withErrors(['username' => 'Sai tài khoản hoặc mật khẩu'])->withInput();
        }
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'fullname' => 'required|string|max:200',
            'displayname' => 'required|string|max:150',
            'username' => 'required|string|unique:tbl_users,username',
            'email' => 'required|email|unique:tbl_users,email',
            'password' => 'required|string|min:6|max:50|confirmed',
        ], [
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);

        // Lưu user
        $user = new User();
        $user->fullname = $request->fullname;
        $user->displayname = $request->displayname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // ✅ Hash mật khẩu
        $user->save();

        // Trả về JSON cho fetch API
        return response()->json([
            'success' => true,
            'redirect' => route('user.login'),
        ]);
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}

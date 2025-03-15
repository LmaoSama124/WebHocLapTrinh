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
    // Xử lý đăng ký
    public function storeRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:200',
            'displayname' => 'required|string|max:150',
            'username' => [
                'required',
                'string',
                'max:200',
                'unique:tbl_users,username',
                'regex:/^[a-zA-Z0-9@_\-.,;\'"\[\]\(\)\*&\^%$#@!]+$/',
            ],
            'email' => 'required|string|email|max:200|unique:tbl_users,email',
            'password' => [
                'required',
                'string',
                'min:6',
                'max:50',
            ],
            'password_confirmation' => 'required|same:password',
        ], [
            'fullname.required' => 'Vui lòng nhập họ tên đầy đủ.',
            'displayname.required' => 'Vui lòng nhập tên hiển thị.',
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'username.regex' => 'Tên đăng nhập không được chứa các ký tự đặc biệt ngoài bàn phím.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 50 ký tự.',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',
            'password_confirmation.same' => 'Mật khẩu nhập lại không khớp.',
        ]);

        if ($validator->fails()) {
            // Kiểm tra xem yêu cầu có phải từ Ajax không
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
            
            // Nếu không phải Ajax, xử lý bình thường
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Tạo người dùng mới
        $user = User::create([
            'fullname' => $request->fullname,
            'displayname' => $request->displayname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone ?? null,
        ]);

        // Đăng nhập người dùng sau khi đăng ký
        Auth::login($user);

        // Trả về kết quả tùy theo loại yêu cầu
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công!',
                'redirect' => route('user.index')
            ]);
        }
        
        // Nếu không phải Ajax, chuyển hướng bình thường
        return redirect()->route('user.index')->with('success', 'Đăng ký thành công!');
    }

    // Hiển thị form đăng nhập
    public function login()
    {
        return view('user.themes.login.login');
    }

    // Xử lý đăng nhập
    public function authenticate(Request $request)
    {
        // Validate inputs
        $validator = Validator::make($request->all(), [
            'username' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9@_\-.,;\'"\[\]\(\)\*&\^%$#@!]+$/',
                function ($attribute, $value, $fail) {
                    // Check if username exists
                    $user = \App\Models\User::where('username', $value)
                        ->orWhere('email', $value)
                        ->first();

                    if (!$user) {
                        $fail('Tên đăng nhập không tồn tại trong hệ thống.');
                    }
                },
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:50',
            ],
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.regex' => 'Tên đăng nhập không được chứa các ký tự đặc biệt ngoài bàn phím.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 50 ký tự.',
        ]);

        if ($validator->fails()) {
            // Xử lý Ajax nếu cần
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
            
            return back()->withErrors($validator)->withInput();
        }

        // Check for credentials
        $credentials = $request->only('username', 'password');

        // First check if user exists (we already validated this above, but we need the user object)
        $user = \App\Models\User::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();

        if ($user && !Hash::check($request->password, $user->password)) {
            // Xử lý mật khẩu không đúng
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => ['password' => ['Mật khẩu không chính xác.']]
                ]);
            }
            
            return back()->withErrors([
                'password' => 'Mật khẩu không chính xác.',
            ])->withInput();
        }

        // Thử đăng nhập
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]) || 
            Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            
            $request->session()->regenerate();
            
            // Xử lý Ajax nếu cần
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Đăng nhập thành công!',
                    'redirect' => route('user.index')
                ]);
            }
            
            return redirect()->route('user.index')->with('success', 'Đăng nhập thành công!');
        }

        // Trường hợp đăng nhập thất bại khác
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'errors' => ['username' => ['Thông tin đăng nhập không chính xác!']]
            ]);
        }
        
        // This should rarely happen due to our custom validation above
        return back()->withErrors([
            'username' => 'Thông tin đăng nhập không chính xác!',
        ])->withInput();
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Xử lý Ajax nếu cần
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã đăng xuất!',
                'redirect' => route('user.login')
            ]);
        }
        
        return redirect()->route('user.login')->with('success', 'Đã đăng xuất!');
    }
}
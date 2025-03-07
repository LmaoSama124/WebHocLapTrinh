<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    // Hiển thị danh sách tất cả thanh toán
    public function index()
    {
        $payments = Payment::with(['user', 'course'])->get(); // ✅ Load luôn thông tin user và course
        return view('admin.themes.payments.tablePayment', compact('payments'));
    }

    // Hiển thị chi tiết một thanh toán
    public function show($id)
    {
        $payment = Payment::with(['user', 'course'])->findOrFail($id); // ✅ Load thông tin khóa học và user
        return view('admin.themes.payments.paymentDetail', compact('payment'));
    }

    // Hiển thị form tạo thanh toán mới
    public function create()
    {
        $users = User::all(); // ✅ Lấy danh sách người dùng
        $courses = Course::all(); // ✅ Lấy danh sách khóa học
        return view('admin.themes.payments.createPayment', compact('users', 'courses'));
    }

    // Lưu thanh toán mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:tbl_users,id',
            'id_course' => 'required|exists:tbl_courses,id',
            'payment_method' => 'required|in:vn_pay,banking',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:waiting,success,canceled',
        ]);

        try {
            Payment::create($request->all());
            return redirect()->route('admin.payments.index')->with('success', 'Thanh toán đã được thêm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    // Hiển thị form chỉnh sửa thanh toán
    public function edit($id)
    {
        $payment = Payment::with(['user', 'course'])->findOrFail($id); // ✅ Load dữ liệu user và khóa học
        $users = User::all(); // ✅ Lấy danh sách người dùng
        $courses = Course::all(); // ✅ Lấy danh sách khóa học
        return view('admin.themes.payments.editPayment', compact('payment', 'users', 'courses'));
    }

    // Cập nhật thông tin thanh toán
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required|exists:tbl_users,id',
            'id_course' => 'required|exists:tbl_courses,id',
            'payment_method' => 'required|in:vn_pay,banking',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:waiting,success,canceled',
        ]);

        try {
            $payment = Payment::findOrFail($id);
            $payment->update($request->all());
            return redirect()->route('admin.payments.index')->with('success', 'Thông tin thanh toán đã được cập nhật');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    // Xóa một thanh toán
    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return redirect()->route('admin.payments.index')->with('success', 'Thanh toán đã được xóa');
        } catch (\Exception $e) {
            return back()->with('error', 'Không thể xóa thanh toán: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentUserController extends Controller
{
    public function course_payment($id)
    {
        $user = auth()->user();
        $course = Course::findOrFail($id); // Lấy khoá học từ DB

        return view('user.themes.payment.course-payment', compact('user', 'course'));
    }

    public function processPayment(Request $request)
    {
        $user = auth()->user();
        $course = Course::findOrFail($request->course_id);
        $paymentMethod = $request->payment_method;

        if ($paymentMethod == 'vn_pay') {
            return view('user.themes.payment.vnPay', compact('user', 'course'));
        } elseif ($paymentMethod == 'banking') {
            $bankCode = 'bidv';  // Thay bank của bạn
            $accountNumber = '4511092520'; // STK nhận tiền
            $amount = $course->price;

            // Nội dung chuyển khoản chuyên nghiệp đầy đủ
            $content = 'MaKH ' . $user->id . ' Ten ' . $user->fullname . ' MaKHOA ' . $course->id;

            // Encode nội dung để lên QR
            $qrUrl = "https://img.vietqr.io/image/{$bankCode}-{$accountNumber}-compact.png?amount={$amount}&addInfo=" . urlencode($content);

            return view('user.themes.payment.banking', compact('user', 'course', 'qrUrl', 'content', 'amount'));
        } else {
            return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ!');
        }
    }

    public function confirmBanking(Request $request)
    {
        $user = auth()->user();
        $courseId = $request->course_id;

        $exists = Payment::where('id_user', $user->id)
            ->where('id_course', $courseId)
            ->where('payment_method', 'banking')
            ->exists();

        if ($exists) {
            return redirect()->route('user.index')->with('banking_error', 'Bạn đã xác nhận thanh toán cho khóa học này rồi!');
        }

        Payment::create([
            'id_user' => $user->id,
            'id_course' => $courseId,
            'payment_method' => 'banking',
            'content' => $request->content,
            'amount' => $request->amount,
            'status' => 'waiting',
        ]);

        // ✅ Xong -> Về home với thông báo thành công
        return redirect()->route('user.index')->with('banking_success', 'Yêu cầu của bạn sẽ được duyệt sau 1 tiếng!');
    }
}

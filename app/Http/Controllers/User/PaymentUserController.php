<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Str;

class PaymentUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function course_payment($id)
    {
        $user = auth()->user();
        $course = Course::findOrFail($id);

        return view('user.themes.payment.course-payment', compact('user', 'course'));
    }

    public function processPayment(Request $request)
    {
        Log::info('PaymentUserController::processPayment called with data: ', $request->all());

        $request->validate([
            'course_id' => 'required|exists:tbl_courses,id',
            'payment_method' => 'required|in:vn_pay,banking',
        ]);

        $user = auth()->user();
        $course = Course::findOrFail($request->course_id);
        $paymentMethod = $request->payment_method;

        if ($paymentMethod == 'vn_pay') {
            Log::info('Redirecting to vnpay_form for course: ' . $course->id);
            return view('user.themes.vnpay.form', compact('user', 'course'));
        } elseif ($paymentMethod == 'banking') {
            $bankCode = 'bidv';
            $accountNumber = '4511092520';
            $amount = $course->price;
            $content = 'MaKH ' . $user->id . ' Ten ' . $user->fullname . ' MaKHOA ' . $course->id;

            $qrUrl = "https://img.vietqr.io/image/{$bankCode}-{$accountNumber}-compact.png?amount={$amount}&addInfo=" . urlencode($content);

            Log::info('Redirecting to banking view for course: ' . $course->id);
            return view('user.themes.payment.banking', compact('user', 'course', 'qrUrl', 'content', 'amount'));
        } else {
            Log::error('Invalid payment method: ' . $paymentMethod);
            return redirect()->route('user.course-payment', $request->course_id)->with('error', 'Phương thức thanh toán không hợp lệ!');
        }
    }

    public function confirmBanking(Request $request)
    {
        Log::info('PaymentUserController::confirmBanking called with data: ', $request->all());

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
            'transaction_code' => strtoupper(Str::random(10)),
        ]);

        return redirect()->route('user.index')->with('banking_success', 'Yêu cầu của bạn sẽ được duyệt sau 1 tiếng!');
    }
}
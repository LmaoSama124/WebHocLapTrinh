<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ChatBotController extends Controller
{
    /**
     * Xử lý yêu cầu webhook của BotMan.
     */
    public function handle()
    {
        $botman = app('botman');

        // Debug: Log toàn bộ request
        Log::info('BotMan request received:', request()->all());

        // Debug: Log tin nhắn nhận được
        $message = request()->input('message');
        Log::info('BotMan received message:', ['message' => $message]);

        // Chào hỏi
        $botman->hears('hi|hello|chào', function (BotMan $bot) {
            $bot->reply('Chào bạn! Tôi là trợ lý lập trình. Hỏi tôi về code (ví dụ: "Biến là gì?") hoặc hỗ trợ khách hàng (ví dụ: "Liên hệ hỗ trợ") nhé!');
        });

        // Câu hỏi lập trình cố định
        $botman->hears('biến là gì|variable là gì.*', function (BotMan $bot) {
            $bot->reply('Biến là nơi lưu trữ dữ liệu như số, chuỗi. Ví dụ trong PHP: `$age = 25;` lưu số 25 vào biến `$age`. Bạn muốn ví dụ bằng Python hay JavaScript không?');
        });

        $botman->hears('vòng lặp là gì|loop là gì.*', function (BotMan $bot) {
            $bot->reply('Vòng lặp chạy lặp lại mã. Trong PHP, `for ($i = 1; $i <= 5; $i++) { echo $i; }` in từ 1 đến 5. Cần ví dụ khác không?');
        });

        $botman->hears('hàm là gì|function là gì.*', function (BotMan $bot) {
            $bot->reply('Hàm là đoạn mã thực hiện nhiệm vụ cụ thể. Trong PHP: `function cong($a, $b) { return $a + $b; }`. Gọi `cong(2, 3)` trả về 5. Muốn biết thêm không?');
        });

        // Câu hỏi CSKH cố định
        $botman->hears('liên hệ hỗ trợ|hỗ trợ|contact support', function (BotMan $bot) {
            $bot->reply('Liên hệ chúng tôi qua email support@website.com hoặc số +84-123-456-789. Có vấn đề gì cần giúp ngay không?');
        });

        $botman->hears('khóa học|course.*|học lập trình.*', function (BotMan $bot) {
            $bot->reply('Chúng tôi có khóa học PHP, Python, JavaScript... Xem chi tiết tại /khoa-hoc. Bạn muốn học gì?');
        });

        // Thu thập phản hồi
        $botman->hears('phản hồi|feedback', function (BotMan $bot) {
            $bot->ask('Cảm ơn bạn! Bạn muốn gửi phản hồi gì?', function (Answer $answer) {
                $feedback = $answer->getText();
                // Có thể lưu $feedback vào database
                $this->say('Phản hồi của bạn: "' . $feedback . '" đã được ghi nhận. Cảm ơn bạn!');
            });
        });

        // Xử lý câu hỏi tự do
        $botman->hears('{message}', function (BotMan $bot, $message) {
            $message = Str::lower($message);

            // Từ khóa lập trình
            if (Str::contains($message, ['lỗi', 'bug', 'debug'])) {
                $bot->reply('Gặp lỗi hả? Hãy kiểm tra cú pháp, biến, hoặc log lỗi. Bạn có thể gửi mã để tôi xem không?');
            } elseif (Str::contains($message, ['mảng', 'array'])) {
                $bot->reply('Mảng chứa nhiều giá trị. Trong PHP: `$colors = ["đỏ", "xanh"];`. Bạn muốn học cách thêm/xóa phần tử không?');
            } elseif (Str::contains($message, ['html', 'css', 'javascript'])) {
                $bot->reply('HTML tạo cấu trúc, CSS định kiểu, JS thêm tương tác. Hỏi tôi về thẻ HTML, CSS hay hàm JS nhé!');
            } elseif (Str::contains($message, ['database', 'cơ sở dữ liệu', 'sql'])) {
                $bot->reply('Cơ sở dữ liệu lưu dữ liệu có tổ chức. Trong PHP, dùng Eloquent hoặc PDO để truy vấn. Cần ví dụ SQL không?');
            }
            // Từ khóa CSKH
            elseif (Str::contains($message, ['tài khoản', 'account', 'đăng nhập', 'login'])) {
                $bot->reply('Vấn đề đăng nhập? Kiểm tra email/mật khẩu hoặc dùng /quen-mat-khau để đặt lại. Cần tôi hướng dẫn thêm không?');
            } elseif (Str::contains($message, ['thanh toán', 'payment', 'mua'])) {
                $bot->reply('Chúng tôi hỗ trợ thanh toán qua thẻ, ví điện tử. Xem tại /thanh-toan. Bạn gặp vấn đề gì?');
            }
            // Fallback
            else {
                $bot->reply('Xin lỗi, tôi chưa hiểu. Hỏi về lập trình (ví dụ: "Mảng là gì?") hoặc hỗ trợ (ví dụ: "Làm sao mua khóa học?") nhé!');
            }
        });

        $botman->listen();
    }

    /**
     * Hiển thị giao diện chatbot.
     */
    public function showChatbot()
    {
        return view('user.chatbot_box'); // Sửa từ users thành user
    }

    /**
     * Gửi phản hồi.
     */
    protected function say($message)
    {
        app('botman')->say($message, [], app('botman')->getDriver()->getName());
    }
}
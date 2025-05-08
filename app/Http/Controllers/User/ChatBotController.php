<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // ✅ BẮT BUỘC PHẢI CÓ

class ChatBotController extends Controller
{
    public function sendMessage(Request $request)
    {
        try {
            $question = $request->input('message');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ])->post('https://api.openai.com/v1/chat/completions', [
                        'model' => 'gpt-3.5-turbo',
                        'messages' => [
                            ['role' => 'system', 'content' => 'Bạn là chatbot hỗ trợ CSKH và lập trình'],
                            ['role' => 'user', 'content' => $question],
                        ],
                        'max_tokens' => 1000,
                    ]);

            if (!$response->successful()) {
                Log::error('GPT Error: ' . $response->body());
                return response()->json(['reply' => 'Lỗi từ GPT hoặc API'], 500);
            }

            $answer = $response['choices'][0]['message']['content'];

            return response()->json(['reply' => $answer]);
        } catch (\Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage());
            return response()->json(['reply' => 'Lỗi server, thử lại sau!'], 500);
        }
    }
}

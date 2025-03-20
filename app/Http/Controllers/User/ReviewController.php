<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $courseId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Review::create([
            'id_user' => Auth::id(),
            'id_course' => $courseId,
            'content' => $request->input('content'),
            'rate' => 5,
            'status' => 'exist'
        ]);

        return back()->with('success', 'Bình luận của bạn đã được gửi!');
    }
}

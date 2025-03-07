<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    // Hiển thị danh sách tất cả review
    public function index()
    {
        $reviews = Review::with(['user', 'course'])->get();
        return view('admin.themes.reviews.tableReview', compact('reviews'));
    }

    // Hiển thị chi tiết một review
    public function show($id)
    {
        $review = Review::with(['user', 'course'])->findOrFail($id);
        return view('admin.themes.reviews.reviewDetail', compact('review'));
    }

    // Hiển thị form tạo review mới
    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view('admin.themes.reviews.createReview', compact('users', 'courses'));
    }

    // Lưu review mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:tbl_users,id',
            'id_course' => 'required|exists:tbl_courses,id',
            'content' => 'required|string',
            'rate' => 'required|numeric|min:0|max:5',
            'status' => 'required|in:removed,exist',
        ]);

        Review::create($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Review đã được thêm thành công');
    }

    // Hiển thị form chỉnh sửa review
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $users = User::all();
        $courses = Course::all();
        return view('admin.themes.reviews.editReview', compact('review', 'users', 'courses'));
    }

    // Cập nhật thông tin review
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required|exists:tbl_users,id',
            'id_course' => 'required|exists:tbl_courses,id',
            'content' => 'required|string',
            'rate' => 'required|numeric|min:0|max:5',
            'status' => 'required|in:removed,exist',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Review đã được cập nhật thành công');
    }

    // Xóa một review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review đã được xóa thành công');
    }
}

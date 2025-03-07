<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // Hiển thị danh sách tất cả khoá học
    public function index()
    {
        $courses = Course::with('category')->get();
        return view('admin.themes.courses.tableCourse', compact('courses'));
    }

    // Hiển thị chi tiết một khoá học
    public function show($id)
    {
        $course = Course::with('category')->findOrFail($id);
        return view('admin.themes.courses.courseDetail', compact('course'));
    }

    // Hiển thị form tạo khoá học mới
    public function create()
    {
        $categories = Category::all();
        return view('admin.themes.courses.createCourse', compact('categories'));
    }

    // Lưu khoá học mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'level' => 'required|string|max:50',
            'lesson' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:tbl_categories,id',
            'total_time_finish' => 'required|string',
            'finish_time' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expiration_date' => 'required|integer|min:1|max:6',
            'status' => 'required|in:Complete,Uncomplete',
            'is_free' => 'required|boolean',
            'is_popular' => 'required|boolean',
        ]);

        $data = $request->except('thumbnail');

        // ✅ Xử lý file ảnh nếu có
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        $course = Course::create($data);

        return $course
            ? redirect()->route('admin.courses.index')->with('success', 'Khóa học đã được thêm thành công')
            : back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
    }

    // Hiển thị form chỉnh sửa khoá học
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();
        return view('admin.themes.courses.editCourse', compact('course', 'categories'));
    }

    // Cập nhật thông tin khoá học
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'level' => 'required|string|max:50',
            'lesson' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:tbl_categories,id',
            'total_time_finish' => 'required|string',
            'finish_time' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expiration_date' => 'required|integer|min:1|max:6',
            'rate' => 'nullable|numeric|min:0',
            'student_enrolled' => 'nullable|integer|min:0',
            'status' => 'required|in:Complete,Uncomplete',
            'is_free' => 'required|boolean',
            'is_popular' => 'required|boolean',
        ]);

        $course = Course::findOrFail($id);
        $data = $request->except('thumbnail');

        // ✅ Kiểm tra và xóa ảnh cũ trước khi cập nhật thumbnail mới
        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Thông tin khóa học đã được cập nhật');
    }

    // Xóa một khoá học
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // ✅ Xóa ảnh trong storage nếu có
        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Khoá học này đã được xoá');
    }
}

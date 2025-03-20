<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Lesson;

class CourseUserController extends Controller
{
    public function detail($id)
    {
        // Lấy thông tin khóa học từ bảng tbl_courses
        $course = DB::table('tbl_courses')
            ->where('id', $id)
            ->first();

        if (!$course) {
            return abort(404);
        }

        // Lấy danh sách các bài học thuộc khóa học này từ bảng tbl_lessons
        $lessons = DB::table('tbl_lessons')
            ->where('id', $id)
            ->orderBy('id')
            ->get();

        return view('user.course-detail', [
            'course' => $course,
            'lessons' => $lessons,
        ]);
    }
    // Trong controller của bạn
    public function course_detail($id)
    {
        $course = Course::findOrFail($id);
        $lessons = Lesson::where('id', $id)->get();

        return view('user.themes.course.course-detail', compact('course', 'lessons'));
    }
    public function course_enrolled()
    {
        return view('user.themes.course.enrolled-courses');
    }
}

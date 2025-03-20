<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;

class CourseUserController extends Controller
{
    public function showVideo($id, $lessonId)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login')->with('error', 'Bạn cần đăng nhập để xem video.');
        }

        $user = Auth::user();
        $isEnrolled = DB::table('tbl_course_enrolled')
            ->where('id_user', $user->id)
            ->where('id_course', $id)
            ->exists();

        $lesson = Lesson::findOrFail($lessonId);
        $lessons = Lesson::where('id_course', $id)->get();
        $reviews = Review::where('id_course', $id)->where('status', 'exist')->orderByDesc('created_at')->get();

        if ($lesson->is_preview || $isEnrolled) {
            return view('user.video', compact('user', 'lesson', 'lessons', 'reviews'))
                ->with('courseId', $id);
        } else {
            return redirect()->route('user.course-detail', $id)
                ->with('error', 'Bạn cần đăng ký khóa học để xem video này.');
        }
    }
    public function course_detail($id)
    {
        $course = Course::findOrFail($id);
        $lessons = Lesson::where('id_course', $id)->get();
        return view('user.themes.course.course-detail', compact('course', 'lessons'));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $course = Course::with(['lessons', 'category'])->findOrFail($id);

        $chapters = json_decode($course->list_chapter, true); // Decode sẵn

        $popularCourses = Course::where('is_popular', 1)->limit(5)->get();

        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->limit(5)
            ->get();

        return view('user.themes.course.course-detail', compact('user', 'course', 'chapters', 'popularCourses', 'relatedCourses'));
    }
}

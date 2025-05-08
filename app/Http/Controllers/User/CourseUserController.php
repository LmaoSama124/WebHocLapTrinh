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
        $chapters = json_decode($course->list_chapter, true);
        $popularCourses = Course::where('is_popular', 1)->limit(5)->get();

        // Ghi nhận lượt xem vào course_views (ưu tiên view_count và last_viewed_at)
        if ($user) {
            $existing = DB::table('course_views')
                ->where('user_id', $user->id)
                ->where('category_id', $course->category_id)
                ->first();

            if ($existing) {
                DB::table('course_views')
                    ->where('user_id', $user->id)
                    ->where('category_id', $course->category_id)
                    ->update([
                        'view_count' => $existing->view_count + 1,
                        'last_viewed_at' => now()
                    ]);
            } else {
                DB::table('course_views')->insert([
                    'user_id' => $user->id,
                    'category_id' => $course->category_id,
                    'view_count' => 1,
                    'last_viewed_at' => now()
                ]);
            }

            $viewedCategoryIds = DB::table('course_views')
                ->where('user_id', $user->id)
                ->orderByDesc('view_count')
                ->orderByDesc('last_viewed_at')
                ->pluck('category_id');

            $recommendedCourses = Course::whereIn('category_id', $viewedCategoryIds)
                ->where('id', '!=', $course->id)
                ->inRandomOrder()
                ->limit(8)
                ->get();
        } else {
            $recommendedCourses = Course::where('category_id', $course->category_id)
                ->where('id', '!=', $course->id)
                ->inRandomOrder()
                ->limit(8)
                ->get();
        }

        return view('user.themes.course.course-detail', compact('user', 'course', 'chapters', 'popularCourses', 'recommendedCourses'));
    }
}

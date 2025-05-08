<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use Auth;

class ThemeHomeController extends Controller
{
    public function course()
    {
        return view('user.themes.course.course');
    }

    public function indexuser()
    {
        $user = Auth::user();
        $suggestedCourses = collect(); // Danh sách khóa học gợi ý
        $randomCourses = collect(); // Danh sách khóa học ngẫu nhiên

        if ($user) {
            // Lấy danh sách category_id đã xem, sắp xếp theo view_count và last_viewed_at
            $viewedCategoryIds = DB::table('course_views')
                ->where('user_id', $user->id)
                ->orderByDesc('view_count')
                ->orderByDesc('last_viewed_at')
                ->pluck('category_id')
                ->unique()
                ->values();

            if ($viewedCategoryIds->isNotEmpty()) {
                // Lấy 4 khóa học gợi ý từ các category_id đã xem
                $suggestedCourses = Course::whereIn('category_id', $viewedCategoryIds)
                    ->inRandomOrder()
                    ->limit(4)
                    ->get();
            }

            // Nếu không đủ 4 khóa học gợi ý, bổ sung thêm khóa học ngẫu nhiên
            if ($suggestedCourses->count() < 4) {
                $excludeCourseIds = $suggestedCourses->pluck('id')->toArray();
                $additionalSuggested = Course::whereNotIn('id', $excludeCourseIds)
                    ->inRandomOrder()
                    ->limit(4 - $suggestedCourses->count())
                    ->get();
                $suggestedCourses = $suggestedCourses->merge($additionalSuggested);
            }

            // Lấy 12 khóa học ngẫu nhiên, loại trừ các khóa học đã gợi ý
            $excludeCourseIds = $suggestedCourses->pluck('id')->toArray();
            $randomCourses = Course::whereNotIn('id', $excludeCourseIds)
                ->inRandomOrder()
                ->limit(12)
                ->get();

            // Nếu không đủ 12 khóa học ngẫu nhiên, lấy thêm bất kỳ khóa học nào còn lại
            if ($randomCourses->count() < 88) {
                $remainingCourses = Course::whereNotIn('id', $excludeCourseIds)
                    ->inRandomOrder()
                    ->limit(12 - $randomCourses->count())
                    ->get();
                $randomCourses = $randomCourses->merge($remainingCourses);
            }
        } else {
            // Người dùng chưa đăng nhập: lấy 16 khóa học ngẫu nhiên
            $randomCourses = Course::inRandomOrder()->limit(12)->get();
        }

        // Kết hợp suggestedCourses và randomCourses thành recommendedCourses để tương thích với view hiện tại
        $recommendedCourses = $suggestedCourses->merge($randomCourses);

        return view('user.index', compact('user', 'suggestedCourses', 'randomCourses', 'recommendedCourses'));
    }

    public function course_enrolled()
    {
        $user = Auth::user();
        $coursesEnrolled = Auth::user()->enrolledCourses()->with('course.category')->get();

        return view('user.themes.course.enrolled-courses', compact('user', 'coursesEnrolled'));
    }

    public function login()
    {
        return view('user.themes.login.login');
    }


    public function filter($id)
    {
        $user = Auth::user();

        if ($id == 'all') {
            $courses = Course::all();
        } else {
            $courses = Course::where('category_id', $id)->get();
        }

        $categories = Category::all();
        return response()->json(['courses' => $courses])->header('Content-Type', 'application/json');
    }

}
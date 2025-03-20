<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
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
        $courses = Course::all();
        return view('user.index', compact('user', 'courses'));
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

    public function course_enrolled()
    {
        $user = Auth::user();
        $coursesEnrolled = Auth::user()->enrolledCourses()->with('course.category')->get();

        return view('user.themes.course.enrolled-courses', compact('user', 'coursesEnrolled', ));
    }
    public function course_payment()
    {
        $user = Auth::user();
        return view('user.themes.course.course-payment', compact('user'));
    }
    public function login()
    {
        return view('user.themes.login.login');
    }
}

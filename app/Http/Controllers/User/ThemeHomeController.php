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

    public function course_enrolled()
    {
        $user = Auth::user();
        $coursesEnrolled = Auth::user()->enrolledCourses()->with('course.category')->get();

        return view('user.themes.course.enrolled-courses', compact('user', 'coursesEnrolled', ));
    }
    public function login()
    {
        return view('user.themes.login.login');
    }
}

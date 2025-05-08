<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Auth;

class ThemeHomeController extends Controller
{
    public function indexuser()
    {
        $user = Auth::user();
        $courses = Course::all();
        $categories = Category::all();
        return view('user.index', compact('user', 'courses', 'categories'));
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

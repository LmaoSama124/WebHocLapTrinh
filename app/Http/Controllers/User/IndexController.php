<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Course;

class IndexController extends Controller
{
    public function course()
    {
        return view('user.themes.course.course');
    }
    public function index()
    {
        $courses = Course::with('category')->get();
        return view('user.index', compact('courses'));
    }  
    public function course_payment()
    {
        return view('user.themes.course.course-payment');
    }
    public function login()
    {
        return view('user.themes.login.login');
    }
}

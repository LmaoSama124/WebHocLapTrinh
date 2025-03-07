<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function course()
    {
        return view('user.themes.course.course');
    }
    public function indexuser()
    {
        return view('user.index');
    }
    public function course_detail()
    {
        return view('user.themes.course.course-detail');
    }
    public function course_enrolled()
    {
        return view('user.themes.course.enrolled-courses');
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

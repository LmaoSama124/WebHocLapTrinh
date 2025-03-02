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
}

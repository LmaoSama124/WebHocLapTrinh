<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class CourseUserController extends Controller
{
    public function course_detail($id)
    {
        $course = Course::findOrFail($id);
        $lessons = Lesson::where('id_course', $id)->get();

        $isEnrolled = false;
        if (Auth::check()) {
            $isEnrolled = DB::table('tbl_payments')
                ->where('id_course', $course->id)
                ->where('id_user', Auth::id())
                ->where('status', 'success')
                ->exists();
        }

        return view('user.themes.course.course-detail', compact('course', 'lessons', 'isEnrolled'));
    }
}

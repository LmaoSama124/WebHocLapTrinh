<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\Lesson;
use App\Http\Controllers\Controller;

class ThemeLessonController extends Controller
{
    public function index($courseId)
    {
        $course = Course::with('lessons')->findOrFail($courseId);
        $lessons = $course->lessons;
        return view('user.themes.course.course-detail', compact('course', 'lessons'));
    }

    public function show($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        return view('user.themes.course.course-detail', compact('lesson'));
    }

}
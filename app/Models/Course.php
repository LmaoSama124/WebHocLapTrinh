<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_courses';
    
    protected $fillable = [
        'title', 'level', 'lesson', 'price', 'category_id', 
        'total_time_finish', 'finish_time', 'thumbnail', 'expiration_date', 
        'rate', 'student_enrolled', 'status', 'is_free', 'is_popular'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}


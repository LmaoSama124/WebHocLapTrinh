<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'tbl_payments';

    protected $fillable = [
        'id_user',
        'id_course',
        'payment_method',
        'content',
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Quan hệ với bảng tbl_courses (Khóa học)
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course', 'id');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed tbl_categories
        $this->seedCategories();
        
        // 2. Seed tbl_users
        $this->seedUsers();
        
        // 3. Seed tbl_admins
        $this->seedAdmins();
        
        // 4. Seed tbl_courses
        $this->seedCourses();
        
        // 5. Seed tbl_lessons
        $this->seedLessons();
        
        // 6. Seed tbl_reviews
        $this->seedReviews();
        
        // 7. Seed tbl_course_enrolled
        $this->seedCourseEnrolled();
        
        // 8. Seed tbl_payments
        $this->seedPayments();
        
        // 9. Seed tbl_messages
        $this->seedMessages();
        
        // 10. Seed tbl_incomes
        $this->seedIncomes();
    }
    
    private function seedCategories()
    {
        $categories = [
            'Lập trình web',
            'Lập trình di động',
            'Khoa học dữ liệu',
            'Thiết kế UI/UX',
            'Phát triển game',
            'Điện toán đám mây',
            'Trí tuệ nhân tạo',
            'Blockchain',
            'Bảo mật thông tin',
            'Quản trị hệ thống'
        ];
        
        foreach ($categories as $category) {
            DB::table('tbl_categories')->insert([
                'category_name' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedUsers()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('tbl_users')->insert([
                'fullname' => 'Người dùng ' . $i,
                'displayname' => 'user' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password' . $i),
                'phone' => '09' . rand(10000000, 99999999),
                'avatar' => 'avatar' . $i . '.jpg',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedAdmins()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('tbl_admins')->insert([
                'username' => 'admin' . $i,
                'password' => Hash::make('admin' . $i),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedCourses()
    {
        $levels = ['Beginner', 'Intermediate', 'Advanced'];
        $statusOptions = ['Complete', 'Uncomplete'];
        
        for ($i = 1; $i <= 10; $i++) {
            $category_id = rand(1, 10);
            $level = $levels[array_rand($levels)];
            $status = $statusOptions[array_rand($statusOptions)];
            $is_free = rand(0, 1);
            $is_popular = rand(0, 1);
            
            DB::table('tbl_courses')->insert([
                'title' => 'Khóa học ' . $i,
                'level' => $level,
                'lesson' => rand(5, 20),
                'price' => $is_free ? 0 : rand(500000, 3000000),
                'category_id' => $category_id,
                'total_time_finish' => rand(10, 50) . ' giờ',
                'finish_time' => rand(1, 6) . ' tháng',
                'thumbnail' => 'course' . $i . '.jpg',
                'expiration_date' => rand(6, 24), // Số tháng
                'rate' => rand(1, 50) / 10,
                'student_enrolled' => rand(10, 500),
                'status' => $status,
                'is_free' => $is_free,
                'is_popular' => $is_popular,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedLessons()
    {
        $chapters = ['Chương 1: Giới thiệu', 'Chương 2: Cơ bản', 'Chương 3: Nâng cao', 'Chương 4: Thực hành'];
        
        for ($i = 1; $i <= 10; $i++) {
            $course_id = rand(1, 10);
            $is_preview = rand(0, 1);
            $chapter = $chapters[array_rand($chapters)];
            
            DB::table('tbl_lessons')->insert([
                'title' => 'Bài học ' . $i,
                'id_course' => $course_id,
                'url' => 'https://example.com/lessons/' . $i,
                'is_preview' => $is_preview,
                'time' => rand(10, 60) . ' phút',
                'chapter' => $chapter,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedReviews()
    {
        $statusOptions = ['removed', 'exist'];
        
        for ($i = 1; $i <= 10; $i++) {
            $user_id = rand(1, 10);
            $course_id = rand(1, 10);
            $status = $statusOptions[array_rand($statusOptions)];
            
            DB::table('tbl_reviews')->insert([
                'id_user' => $user_id,
                'id_course' => $course_id,
                'content' => 'Đánh giá về khóa học ' . $i . '. ' . Str::random(50),
                'rate' => rand(1, 50) / 10,
                'status' => $status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedCourseEnrolled()
    {
        $statusOptions = ['completed', 'in_progess', 'expired'];
        
        for ($i = 1; $i <= 10; $i++) {
            $user_id = rand(1, 10);
            $course_id = rand(1, 10);
            $status = $statusOptions[array_rand($statusOptions)];
            
            // Lấy title của course
            $course = DB::table('tbl_courses')->where('id', $course_id)->first();
            $title_course = $course->title;
            
            DB::table('tbl_course_enrolled')->insert([
                'id_user' => $user_id,
                'id_course' => $course_id,
                'title_course' => $title_course,
                'status' => $status,
                'progess' => rand(0, 100),
                'expiration_date' => Carbon::now()->addMonths(rand(1, 12)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedPayments()
    {
        $paymentMethods = ['vn_pay', 'banking'];
        $statusOptions = ['waiting', 'success', 'canceled'];
        
        for ($i = 1; $i <= 10; $i++) {
            $user_id = rand(1, 10);
            $course_id = rand(1, 10);
            $payment_method = $paymentMethods[array_rand($paymentMethods)];
            $status = $statusOptions[array_rand($statusOptions)];
            
            // Lấy giá của course
            $course = DB::table('tbl_courses')->where('id', $course_id)->first();
            $amount = $course->price;
            
            DB::table('tbl_payments')->insert([
                'id_course' => $course_id,
                'id_user' => $user_id,
                'payment_method' => $payment_method,
                'amount' => $amount,
                'content' => 'Thanh toán khóa học ' . $course->title,
                'status' => $status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedMessages()
    {
        $statusOptions = ['removed', 'exist'];
        
        for ($i = 1; $i <= 10; $i++) {
            $sender_id = rand(1, 10);
            $receiver_id = rand(1, 10);
            
            // Đảm bảo sender_id khác receiver_id
            while ($receiver_id == $sender_id) {
                $receiver_id = rand(1, 10);
            }
            
            $status = $statusOptions[array_rand($statusOptions)];
            
            DB::table('tbl_messages')->insert([
                'id_sender' => $sender_id,
                'id_receiver' => $receiver_id,
                'status' => $status,
                'content' => 'Tin nhắn thứ ' . $i . '. ' . Str::random(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
    
    private function seedIncomes()
    {
        for ($i = 1; $i <= 10; $i++) {
            $total_buyer = rand(10, 100);
            $total_amount = $total_buyer * rand(1000000, 5000000);
            
            DB::table('tbl_incomes')->insert([
                'total_buyer' => $total_buyer,
                'total_amount' => $total_amount,
                'time' => Carbon::now()->subDays($i * 30)->month,
                'created_at' => Carbon::now()->subDays($i * 30),
                'updated_at' => Carbon::now()->subDays($i * 30)
            ]);
        }
    }
}
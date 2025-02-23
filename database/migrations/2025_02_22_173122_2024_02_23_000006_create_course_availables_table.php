<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('course_availables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('name', 50);
            $table->foreignId('id_course')->constrained('courses')->onDelete('cascade');
            $table->text('title');
            $table->date('expiration_at');
            $table->string('status', 50);
            $table->string('lpt', 50)->comment('Learning Progress Tracking');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_availables');
    }
};
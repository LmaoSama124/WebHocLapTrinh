<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_course')->constrained('courses')->onDelete('cascade');
            $table->text('title');
            $table->string('chapter', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};
<?php

// 2025_03_03_000008_create_messages_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbl_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->enum('status', ['removed', 'exist'])->default('exist');
            $table->text('content');
            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id')
                  ->on('tbl_users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_messages');
    }
};
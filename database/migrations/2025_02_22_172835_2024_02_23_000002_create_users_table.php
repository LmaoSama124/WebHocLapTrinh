<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50);
            $table->string('password', 50);
            $table->string('name', 50);
            $table->smallInteger('age');
            $table->string('address', 50);
            $table->enum('sexx', ['nam', 'nu']);
            $table->date('dob');
            $table->string('phone', 15);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};;

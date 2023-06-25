<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsAndGradesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('gender', 10);
            $table->date('date_of_birth');
            $table->string('email', 50);
            $table->string('address', 100);
            $table->string('student_id', 50);
            $table->string('phone_number', 20);
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->integer('quiz');
            $table->integer('assignment');
            $table->integer('attendance');
            $table->integer('practical');
            $table->integer('final_exam');
            $table->integer('final_score');
            $table->string('final_grade', 10);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
        Schema::dropIfExists('students');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            //$table->id();
            $table->engine='InnoDB';
            $table->string('Name')->primary()->unique();
            /*$table->unsignedBigInteger('DoctorID')->unsigned()->index()->nullable();
            $table->foreign('DoctorID')->references('id')->on('doctors')->onDelete('set null');
            $table->integer('TeacherID')->default(0);*/
            //->index();
            //$table->foreign('TeacherID')->references('ID')->on('Doctor')->onDelete('cascade');
            $table->text('CourseTeacher');
            $table->double('CourseYear');
            $table->integer('CourseSeason');
            $table->text('CourseNameAR');
            $table->boolean('HaveLabCourse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

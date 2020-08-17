<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            /*
            $table->unsignedBigInteger('DoctorID')->unsigned()->index()->nullable();
            $table->foreign('DoctorID')->references('id')->on('doctors')->onDelete('set null');
            */
            $table->unsignedBigInteger('StudentID')->unsigned()->index()->nullable();
            $table->foreign('StudentID')->references('id')->on('users')->onDelete('set null');
            //$table->string('Name')->primary()->unique();
            $table->string('CourseName')->index()->nullable();
            $table->foreign('CourseName')->references('Name')->on('courses')->onDelete('set null');
            $table->double('LabHomeworkMark');
            $table->double('LabExamMark');
            $table->double('FinalExamMark');
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
        Schema::dropIfExists('marks');
    }
}

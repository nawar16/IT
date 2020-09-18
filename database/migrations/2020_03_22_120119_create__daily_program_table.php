<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyprogram', function (Blueprint $table) {
            $table->id();
            //$table->string('Name')->primary()->unique();
            $table->string('CourseName')->index()->nullable();
            $table->foreign('CourseName')->references('Name')->on('courses')->onDelete('set null');
            $table->unsignedBigInteger('DoctorID')->unsigned()->index()->nullable();
            $table->foreign('DoctorID')->references('id')->on('doctors')->onDelete('set null');
            $table->integer('ClassNumber');
            $table->string('Year',3);
            $table->text('Day');
            $table->text('Time');
            $table->text('Place');
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
        Schema::dropIfExists('dailyprogram');
    }
}

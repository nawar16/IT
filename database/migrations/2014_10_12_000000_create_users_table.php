<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->BigIncrements('id')->unsigned()->unique();
            $table->string('name');
            $table->string('universityID')->unique();
            $table->timestamp('universityID_verified_at')->nullable();
            $table->string('password');
            $table->double('Year')->nullable();
            $table->text('OtherCourses')->nullable();
            $table->integer('Class')->nullable();
            $table->boolean('IsAdmin')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

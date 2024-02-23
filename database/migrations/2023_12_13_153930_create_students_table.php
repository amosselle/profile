<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('regno')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->integer('yos');
            $table->string('password'); // Added password field

            // Foreign keys
            $table->unsignedBigInteger('uni_id'); // University ID
            $table->foreign('uni_id')->references('id')->on('universities'); // Referencing universities table

            $table->unsignedBigInteger('college_id'); // College ID
            $table->foreign('college_id')->references('id')->on('colleges'); // Referencing colleges table

            $table->unsignedBigInteger('dept_id'); // Department ID
            $table->foreign('dept_id')->references('id')->on('departments'); // Referencing departments table
            
            $table->unsignedBigInteger('program_id'); // Department ID
            $table->foreign('program_id')->references('id')->on('programs'); // Referencing departments table

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
        Schema::dropIfExists('students');
    }
}

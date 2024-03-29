<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('place_name', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->integer('capacity')->nullable();
            $table->string('branch', 255)->nullable();
            $table->string('area', 255)->nullable();
            $table->string('region', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};

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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Make it nullable
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('button_one')->nullable();
            $table->string('button_two')->nullable();
            $table->string('button_three')->nullable();
            $table->string('button_four')->nullable();
            $table->string('background_image')->nullable();
            $table->string('background_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

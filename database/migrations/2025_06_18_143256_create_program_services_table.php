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
        Schema::create('program_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
<<<<<<< HEAD
            $table->string('image_service');
            $table->boolean('show_in_dropdown')->default(true);
            $table->string('slug')->unique();
            $table->string('hero_text');
            $table->string('hero_image')->nullable();
=======
            $table->boolean('show_in_dropdown')->default(true);
            $table->string('slug')->unique();
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_services');
    }
};

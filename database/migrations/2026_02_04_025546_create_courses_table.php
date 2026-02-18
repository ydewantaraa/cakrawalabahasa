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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('sub_description_title')->nullable();
            $table->string('sub_description')->nullable();
            $table->string('category');
            $table->integer('quota');
            $table->integer('duration');
<<<<<<< HEAD
            $table->string('thumbnail')->nullable();
            $table->foreignId('program_service_id')
                ->nullable()
                ->constrained('program_services')
                ->nullOnDelete();
=======
            $table->decimal('price', 10, 2);
            $table->enum('learning_type', ['offline', 'hybrid', 'online'])->default('offline');
            $table->string('thumbnail')->nullable();
            $table->foreignId('program_service_id')
                ->unique()
                ->constrained('program_services')
                ->cascadeOnDelete();
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

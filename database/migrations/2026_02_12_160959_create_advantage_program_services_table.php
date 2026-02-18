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
        Schema::create('advantage_program_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('thumbnail')->nullable();
            $table->string('icon')->nullable();
            $table->foreignId('program_service_id')
                ->constrained('program_services')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advantage_program_services');
    }
};

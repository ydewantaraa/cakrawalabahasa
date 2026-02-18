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
        Schema::create('teacher_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp', 20);
<<<<<<< HEAD
            $table->string('position');
            $table->string('initial_password')->nullable();
=======
            $table->date('position');
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
            $table->foreignId('teacher_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_profiles');
    }
};

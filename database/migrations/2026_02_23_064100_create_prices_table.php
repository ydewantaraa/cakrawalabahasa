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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 15, 2);
            $table->integer('quantity')->default(1);
            $table->integer('package_size');
            $table->enum('unit_type', [
                'fixed',
                'per_item'
            ])->default('fixed');
            $table->string('label_type');
            // WAJIB - semua harga tetap terikat ke course
            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->foreignId('course_service_id')
                ->constrained('course_services')
                ->cascadeOnDelete();

            // OPTIONAL - jika harga spesifik sub layanan
            $table->foreignId('sub_course_service_id')
                ->nullable()
                ->constrained('sub_course_services')
                ->nullOnDelete();

            // OPTIONAL - jika harga spesifik media
            $table->foreignId('media_id')
                ->nullable()
                ->constrained('medias')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};

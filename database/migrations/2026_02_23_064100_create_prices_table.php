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
            $table->boolean('hasQuantity')->default(false); // true ketika unit type = per item
            $table->string('package_size')->nullable(); // harus diisi ketika unit type = fixed
            $table->enum('learning_type', ['online', 'offline', 'hybrid'])->nullable();
            $table->enum('unit_type', [
                'fixed',
                'per_item'
            ])->default('fixed');
            $table->string('label_type')->nullable(); // harus diisi ketika unit type = per item
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

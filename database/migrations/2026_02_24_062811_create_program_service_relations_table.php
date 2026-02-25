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
        Schema::create('program_service_relations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('program_service_id')
                ->constrained('program_services') // otomatis ke kolom id
                ->cascadeOnDelete();

            $table->foreignId('related_program_service_id')
                ->constrained('program_services')
                ->cascadeOnDelete();

            $table->unique(
                ['program_service_id', 'related_program_service_id'],
                'program_relation_unique'
            );

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_service_relations');
    }
};

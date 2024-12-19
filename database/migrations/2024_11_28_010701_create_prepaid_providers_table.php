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
        Schema::create('prepaid_providers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID as primary key
            $table->string('number')->unique(); // Phone number
            $table->string('provider_name'); // Provider name

            // Foreign key for location_id (unsignedBigInteger)
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                  ->references('id')
                  ->on('locations')
                  ->cascadeOnDelete(); // Cascade delete if location is deleted

            $table->string('position')->nullable(); // Position or ISP reference
            $table->string('holder'); // Name of holder
            $table->enum('status', ['Terpasang', 'Stand By', 'Bermasalah'])->default('Terpasang'); // Status
            $table->integer('limit')->nullable(); // Limit in currency
            $table->timestamps(); // Adds created_at and updated_at
            $table->softDeletes(); // Adds deleted_at for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prepaid_providers');
    }
};

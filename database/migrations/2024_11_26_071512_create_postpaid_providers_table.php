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
        Schema::create('postpaid_providers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID for the primary key
            
            $table->string('number')->unique(); // Phone number
            $table->string('provider'); // Provider name

            // Foreign key for location_id referencing locations table
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->cascadeOnDelete(); // Cascade delete if location is deleted
            
            $table->string('position')->nullable(); // Position or ISP reference
            $table->string('holder'); // Name of the holder
            $table->enum('status', ['Terpasang', 'Stand By', 'Bermasalah'])->default('Terpasang'); // Status
            $table->integer('limit')->nullable(); // Limit in currency

            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postpaid_providers');
    }
};

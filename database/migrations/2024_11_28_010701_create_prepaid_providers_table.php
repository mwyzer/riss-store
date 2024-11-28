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
            $table->id();
            $table->string('number')->unique(); // Phone number
            $table->string('provider_name'); // Provider name
            $table->foreignId('location_id') // Foreign key to locations table
                  ->constrained('locations')
                  ->onDelete('cascade'); // Cascade delete if location is deleted
            $table->string('position')->nullable(); // Position or ISP reference
            $table->string('holder'); // Name of holder
            $table->enum('status', ['Terpasang', 'Stand By', 'Bermasalah'])->default('Terpasang'); // Status
            $table->integer('limit')->nullable(); // Limit in currency
            $table->timestamps();
            $table->softDeletes();
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

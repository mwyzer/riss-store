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
        Schema::create('satellite_providers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID as primary key
            $table->string('number')->unique(); // Unique Satellite number (e.g., SLK - SID 988277211)
            $table->string('provider'); // Provider name (e.g., OneWeb, Star-TLKM, Ubiqu)

            // Foreign key for location_id
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->cascadeOnDelete(); // Cascade delete if location is deleted

            $table->string('position')->nullable(); // Position (e.g., ISP-01, ISP-02)
            $table->string('holder'); // Holder's name (e.g., Idam, Natanel, Surang)
            $table->enum('status', ['Terpasang', 'Stand By', 'Bermasalah'])->default('Terpasang'); // Status
            
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satellite_providers'); // Drop the table
    }
};

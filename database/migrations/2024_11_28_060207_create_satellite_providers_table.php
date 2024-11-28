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
        Schema::create('satelite_providers', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique(); // Satellite number (e.g., SLK - SID 988277211)
            $table->string('provider'); // Provider name (e.g., OneWeb, Star-TLKM, Ubiqu)
            $table->foreignId('location_id') // Foreign key to locations table
                ->constrained('locations')
                ->onDelete('cascade'); // Cascade delete if location is deleted
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
        Schema::dropIfExists('satellite_providers');
    }
};

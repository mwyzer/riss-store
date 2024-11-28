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
        Schema::create('metro_providers', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique(); // Metro number (e.g., TLK - SID 988277211)
            $table->string('provider'); // Provider name (e.g., Telkom, Indosat, Icon Plus)
            $table->foreignId('location_id') // Foreign key to locations table
                ->constrained('locations')
                ->onDelete('cascade'); // Cascade delete if location is deleted
            $table->string('position')->nullable(); // Position (e.g., ISP-01, ISP-02)
            $table->string('holder'); // Holder's name (e.g., Idam, Natanel)
            $table->enum('status', ['Terpasang', 'Stand By', 'Bermasalah'])->default('Terpasang'); // Status
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metro_providers');
    }
};

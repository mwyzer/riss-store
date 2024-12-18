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
        Schema::create('location_services', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID for the primary key

            // Foreign key for location_id
            $table->uuid('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();

            // Foreign key for service_type_id
            $table->uuid('service_type_id');
            $table->foreign('service_type_id')->references('id')->on('service_types')->cascadeOnDelete();

            $table->boolean('available')->default(true); // Availability status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_services');
    }
};

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
        Schema::create('complaint_histories', function (Blueprint $table) {
            $table->id(); // Changed to auto-incrementing ID
            $table->foreignId('location_id'); // Changed to regular foreign ID
            $table->foreignId('user_id'); // Changed to regular foreign ID
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_histories');
    }
};

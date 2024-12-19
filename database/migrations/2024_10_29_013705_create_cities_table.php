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
        Schema::create('cities', function (Blueprint $table) {
            $table->id(); // Changed to auto-incrementing ID
            $table->foreignId('province_id'); // Changed to regular foreign ID
            $table->string('name');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('province_id')->references('id')->on('provinces')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

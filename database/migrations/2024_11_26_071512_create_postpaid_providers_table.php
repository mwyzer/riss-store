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
            $table->id(); // Primary key
            $table->string('name'); // Provider name (e.g., "Kartu Halo")
            $table->string('description')->nullable(); // Optional description
            $table->timestamps(); // Created and updated timestamps
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

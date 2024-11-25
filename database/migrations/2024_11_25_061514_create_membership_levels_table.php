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
        if (!Schema::hasTable('membership_levels')) {
            Schema::create('membership_levels', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->string('name'); // Name of the membership level
                $table->text('description')->nullable(); // Optional description
                $table->integer('min_spending'); // Changed to integer
                $table->timestamps(); // Created at and updated at timestamps
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_levels');
    }
};


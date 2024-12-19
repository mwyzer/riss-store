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
                $table->id(); // Changed to auto-incrementing ID
                $table->string('name');
                $table->text('description')->nullable();
                $table->integer('min_spending');
                $table->timestamps();
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

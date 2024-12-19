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
        Schema::create('level_members', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID as the primary key
            $table->string('name'); // Level name (e.g., Silver, Gold, Platinum)
            $table->integer('point_multiplier')->default(1); // Points multiplier for each transaction
            $table->integer('bonus_points')->default(0); // Bonus points for specific actions
            $table->integer('minimum_spending'); // Minimum spending to maintain level
            $table->integer('maximum_spending')->nullable(); // Maximum spending for the level
            $table->text('requirements')->nullable(); // Additional requirements (JSON format)
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_members');
    }
};

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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('level_name'); // Membership level name
            $table->text('description')->nullable(); // Description of the membership level
            $table->boolean('is_active')->default(true); // Active status of the membership
            $table->json('rewards')->nullable(); // JSON field to store rewards
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};

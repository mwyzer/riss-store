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
        Schema::create('membership_requirements', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('membershipLevelId')->constrained('membership_levels')->onDelete('cascade'); // Foreign key for membership levels
            $table->string('requirementName', 255); // Requirement name
            $table->text('description')->nullable(); // Description of the requirement
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_requirements');
    }
};

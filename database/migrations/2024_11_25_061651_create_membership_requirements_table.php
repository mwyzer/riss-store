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
            $table->id(); // Auto-incrementing integer primary key
            $table->unsignedBigInteger('membershipLevelId'); // Integer for the foreign key
            $table->string('requirementName', 255); // Requirement name
            $table->text('description')->nullable(); // Description of the requirement
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign key constraint
            $table->foreign('membershipLevelId')->references('id')->on('membership_levels')->cascadeOnDelete();
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

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
        Schema::create('membership_rewards', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('membershipLevelId')->constrained('memberships')->onDelete('cascade'); // Foreign key for memberships
            $table->foreignId('rewardTypeId')->constrained('reward_types')->onDelete('cascade'); // Foreign key for reward types
            $table->unsignedInteger('bonusPoints')->nullable(); // Bonus points
            $table->decimal('nominalRequired', 10, 2)->nullable(); // Nominal required
            $table->string('appliesEvery', 255)->nullable(); // Applies every (e.g., "month", "year")
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_rewards');
    }
};

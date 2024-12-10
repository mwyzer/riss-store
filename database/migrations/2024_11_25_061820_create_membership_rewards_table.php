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
            $table->id();
            $table->foreignId('membership_level_id') // Foreign key to membership_levels
                ->constrained('membership_levels')
                ->onDelete('cascade');
            $table->foreignId('reward_type_id') // Foreign key to reward_types
                ->constrained('reward_types')
                ->onDelete('cascade');
            $table->boolean('is_enabled')->default(true); // Whether the reward is enabled
            $table->integer('bonus_points'); // Bonus points
            $table->decimal('nominal_threshold', 10, 2); // Nominal threshold for the reward
            $table->string('multiplier_type'); // Type of multiplier (e.g., "Nominal", "Percentage")
            $table->json('extra_config')->nullable(); // Extra configuration (optional)
            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Soft delete support
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

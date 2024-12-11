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
        if (!Schema::hasTable('membership_rewards')) {
            Schema::create('membership_rewards', function (Blueprint $table) {
                $table->id();
                $table->foreignId('membershipLevelId')->constrained('memberships')->onDelete('cascade');
                $table->foreignId('rewardTypeId')->constrained('reward_types')->onDelete('cascade');
                $table->unsignedInteger('bonusPoints')->nullable();
                $table->decimal('nominalRequired', 10, 2)->nullable();
                $table->string('appliesEvery', 255)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_rewards');
    }
};

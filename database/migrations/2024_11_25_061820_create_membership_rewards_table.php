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
                $table->uuid('id')->primary(); // UUID for the primary key
                $table->uuid('membershipLevelId'); // UUID for the foreign key
                $table->uuid('rewardTypeId'); // UUID for the foreign key
                $table->unsignedInteger('bonusPoints')->nullable(); // Optional bonus points
                $table->integer('nominalRequired')->nullable(); // Optional nominal required
                $table->string('appliesEvery', 255)->nullable(); // Applies every interval
                $table->timestamps(); // Created at and updated at timestamps
                $table->softDeletes(); // Soft deletes column

                // Define foreign key constraints
                $table->foreign('membershipLevelId')->references('id')->on('memberships')->cascadeOnDelete();
                $table->foreign('rewardTypeId')->references('id')->on('reward_types')->cascadeOnDelete();
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

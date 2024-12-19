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
                $table->id(); // Auto-incrementing integer primary key
                $table->unsignedBigInteger('membershipLevelId'); // Foreign key as integer
                $table->unsignedBigInteger('rewardTypeId'); // Foreign key as integer
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

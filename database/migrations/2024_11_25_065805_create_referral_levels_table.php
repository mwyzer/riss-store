<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralLevelsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('referral_levels', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('levelName', 255); // Referral level name
            $table->foreignId('membershipId')->constrained('memberships')->onDelete('cascade'); // Foreign key referencing memberships
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Deleted at timestamp for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_levels');
    }
}

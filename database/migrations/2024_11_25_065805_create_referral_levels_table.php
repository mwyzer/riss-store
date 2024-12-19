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
            $table->id(); // Auto-incrementing integer primary key
            $table->string('levelName', 255); // Referral level name
            $table->unsignedBigInteger('membershipId'); // Foreign key as integer
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Deleted at timestamp for soft deletes

            // Define foreign key constraint
            $table->foreign('membershipId')->references('id')->on('memberships')->cascadeOnDelete();
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

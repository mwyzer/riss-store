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
        Schema::create('topup_bonuses', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('level_id')->constrained('memberships')->onDelete('cascade'); // Foreign key referencing the 'memberships' table
            $table->integer('nominal_topup'); // Nominal top-up value
            $table->string('berlaku_tiap'); // Apply for each (e.g., time period or conditions)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topup_bonuses');
    }
};

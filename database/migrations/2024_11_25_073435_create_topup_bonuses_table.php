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
            $table->id(); // Auto-incrementing integer primary key
            $table->unsignedBigInteger('level_id'); // Foreign key as integer referencing memberships
            $table->integer('nominal_topup'); // Nominal top-up value
            $table->string('berlaku_tiap'); // Apply for each (e.g., time period or conditions)
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign key constraint
            $table->foreign('level_id')
                ->references('id')
                ->on('memberships')
                ->cascadeOnDelete();
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

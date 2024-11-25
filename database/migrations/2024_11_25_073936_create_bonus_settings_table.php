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
        if (!Schema::hasTable('bonus_settings')) {
            Schema::create('bonus_settings', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->foreignId('partner_type_id')->constrained('partner_types')->onDelete('cascade'); // Foreign key
                $table->string('bonusType', 255);
                $table->boolean('enabled')->default(true);
                $table->integer('points');
                $table->integer('nominalRequired');
                $table->string('appliesEvery', 255);
                $table->timestamps(); // Created at and updated at
                $table->softDeletes(); // Deleted at
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_settings');
    }
};

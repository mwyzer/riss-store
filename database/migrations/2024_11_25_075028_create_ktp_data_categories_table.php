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
        Schema::create('ktp_data_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Category name
            $table->text('description')->nullable(); // Description of the category
            $table->boolean('is_active')->default(true); // Is the category active?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ktp_data_categories');
    }
};

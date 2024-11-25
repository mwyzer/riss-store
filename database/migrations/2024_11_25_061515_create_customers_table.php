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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title')->nullable(); // Customer title (e.g., Mr., Mrs.)
            $table->string('name'); // Customer name
            $table->string('whatsapp_number')->unique(); // Customer WhatsApp number
            $table->string('location')->nullable(); // Customer location
            $table->string('occupation')->nullable(); // Customer occupation
            $table->string('position')->nullable(); // Customer position
            $table->string('photo_self')->nullable(); // URL or path to the customer's photo
            $table->string('self_photo_with_id')->nullable(); // URL or path to photo with ID
            $table->foreignId('membership_level_id')->constrained('membership_levels')->onDelete('cascade'); // Foreign key for membership levels
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

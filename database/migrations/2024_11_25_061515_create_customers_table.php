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
            $table->string('customerTitle')->nullable(); // Customer title (e.g., Mr., Mrs.)
            $table->string('customerName'); // Customer name
            $table->string('customerUniqueid')->unique()->nullable(); // Unique identifier (e.g., KTP/Passport number)
            $table->enum('customerType', ['KTP', 'Passport'])->nullable(); // Customer type (KTP/Passport)
            $table->string('customerWhatsappnumber')->unique(); // WhatsApp contact number
            $table->foreignId('location_id')->nullable()->constrained('locations')->onDelete('cascade'); // Foreign key for location
            $table->string('location')->nullable(); // Free-text location
            $table->string('customerOccupation')->nullable(); // Customer occupation
            $table->string('customerPosition')->nullable(); // Customer position
            $table->decimal('partner_debt', 15, 2)->default(0); // Partner debt
            $table->integer('registered_referrals')->default(0)->nullable(); // Number of referrals registered
            $table->string('customerPhotoself')->nullable(); // URL/path to customer photo
            $table->string('self_photo_with_id')->nullable(); // URL/path to selfie with ID
            $table->foreignId('membership_level_id')->nullable()->constrained('membership_levels')->onDelete('cascade'); // Foreign key for membership level
            $table->enum('customerStatus', ['Active', 'Blocked', 'Inactive'])->default('Active'); // Customer status
            $table->boolean('is_active')->default(true); // Whether the customer is active
            $table->boolean('is_mandatory')->default(false); // Whether specific attributes are mandatory
            $table->softDeletes(); // Adds deleted_at column for soft deletes
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

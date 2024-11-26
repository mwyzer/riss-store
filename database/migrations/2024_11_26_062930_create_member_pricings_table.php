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
        Schema::create('member_pricings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('voucher_profile_id')->constrained('voucher_profiles')->onDelete('cascade'); // Foreign key to VoucherProfile
            $table->string('member_level'); // Member level (e.g., "Silver", "Gold", "Platinum")
            $table->decimal('price', 10, 2); // Voucher price
            $table->decimal('discount_percentage', 5, 2)->default(0); // Discount percentage
            $table->decimal('final_price', 10, 2); // Final price after discount
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_pricings');
    }
};

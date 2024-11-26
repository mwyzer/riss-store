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
        Schema::create('flash_sale_profiles', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('voucher_profile_id')->constrained('voucher_profiles')->onDelete('cascade'); // Foreign key to voucher_profiles
            $table->decimal('flash_sale_price', 15, 2); // Discounted price during flash sale
            $table->timestamp('start_time'); // Start time of the flash sale
            $table->timestamp('end_time'); // End time of the flash sale
            $table->integer('stock')->default(0); // Total stock for the flash sale
            $table->integer('sold')->default(0); // Number of vouchers sold during the flash sale
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flash_sale_profiles');
    }
};

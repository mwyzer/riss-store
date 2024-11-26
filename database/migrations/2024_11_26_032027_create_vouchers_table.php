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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('voucher_type_id')->constrained('voucher_types')->onDelete('cascade'); // Foreign key to VoucherType
            $table->string('profile_name'); // Voucher profile name (e.g., "Kuota 20 GB 15 Hari")
            $table->timestamps(); // Created and update
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};

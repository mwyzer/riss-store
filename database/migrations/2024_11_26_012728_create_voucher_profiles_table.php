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
        Schema::create('voucher_profiles', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Voucher profile name
            $table->string('quota'); // Quota value (e.g., "30 GB")
            $table->integer('duration'); // Duration in days
            $table->enum('status', ['active', 'inactive', 'archived', 'bought_by_customer'])->default('active'); // Voucher status
            $table->integer('import')->default(0); // Imported stock
            $table->integer('stock')->default(0); // Total stock
            $table->integer('sold_today')->default(0); // Vouchers sold today
            $table->integer('sold_this_month')->default(0); // Vouchers sold this month
            $table->integer('sold_total')->default(0); // Total vouchers sold
            $table->integer('remaining_time')->nullable(); // Remaining validity time in minutes/hours/days
            $table->integer('warning_stock_low')->default(0); // Stock warning threshold (low)
            $table->integer('warning_stock_critical')->default(0); // Stock warning threshold (critical)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_profiles');
    }
};

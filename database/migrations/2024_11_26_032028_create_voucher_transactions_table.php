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
        Schema::create('voucher_transactions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('voucher_id')->constrained('vouchers')->onDelete('cascade'); // Foreign key to vouchers
            $table->string('code')->unique(); // Voucher code
            $table->text('comment')->nullable(); // Optional comment
            $table->enum('status', ['Ready', 'Sold', 'Expired'])->default('Ready'); // Status of the voucher
            $table->dateTime('import_date')->nullable(); // Import date
            $table->dateTime('sold_date')->nullable(); // Sold date
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_transactions');
    }
};

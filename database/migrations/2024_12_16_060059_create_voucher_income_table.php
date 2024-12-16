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
        Schema::create('voucher_income', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID column
            $table->unsignedBigInteger('voucherTypeId'); // foreign key for voucher type ID
            $table->integer('income'); // income column, numeric type with precision
            $table->integer('points')->default(0); // points column, default value is 0
            $table->timestamp('createdAt')->useCurrent(); // createdAt column with default value as current timestamp
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_income');
    }
};

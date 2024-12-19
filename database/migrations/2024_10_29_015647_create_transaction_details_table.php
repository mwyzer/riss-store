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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id(); // Changed to auto-incrementing ID
            $table->foreignId('transaction_id'); // Changed to regular foreign ID
            $table->foreignId('product_id'); // Changed to regular foreign ID
            $table->string('product_image');
            $table->string('color');
            $table->string('color_image');
            $table->string('size');
            $table->integer('qty');
            $table->bigInteger('price');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('transaction_id')->references('id')->on('transactions')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};

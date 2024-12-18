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
            $table->uuid('id')->primary(); // Use UUID for the primary key
            $table->uuid('transaction_id'); // Use UUID for transaction_id foreign key
            $table->uuid('product_id'); // Use UUID for product_id foreign key
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

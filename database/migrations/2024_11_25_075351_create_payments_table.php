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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('invoice_id'); // Foreign key to invoices
            $table->foreign('invoice_id')
                  ->references('id')
                  ->on('invoices')
                  ->onDelete('cascade');
            $table->integer('amount'); // Payment amount
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

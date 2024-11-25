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
        if (!Schema::hasTable('invoices')) {
            Schema::create('invoices', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->integer('total_amount'); // Total amount
                $table->integer('amount_paid'); // Amount paid
                $table->integer('amount_due'); // Amount due
        
                // Add foreign key if the statuses table exists
                if (Schema::hasTable('statuses')) {
                    $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade'); // Foreign key for status
                } else {
                    $table->unsignedBigInteger('status_id'); // Placeholder for foreign key
                }
        
                $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // Foreign key for customer
                $table->timestamps(); // Created at and updated at timestamps
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

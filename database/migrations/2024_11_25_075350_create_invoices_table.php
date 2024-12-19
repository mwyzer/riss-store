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
                $table->id(); // Auto-incrementing integer primary key
                $table->integer('total_amount'); // Total amount
                $table->integer('amount_paid'); // Amount paid
                $table->integer('amount_due'); // Amount due

                // Foreign key for statuses table
                if (Schema::hasTable('statuses')) {
                    $table->unsignedBigInteger('status_id'); // Integer foreign key for status
                    $table->foreign('status_id')->references('id')->on('statuses')->cascadeOnDelete();
                } else {
                    $table->unsignedBigInteger('status_id')->nullable(); // Placeholder for status foreign key
                }

                // Foreign key for customers table
                $table->unsignedBigInteger('customer_id'); // Integer foreign key for customers
                $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();

                $table->timestamps(); // Created at and updated at timestamps
                $table->softDeletes(); // Soft deletes column
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

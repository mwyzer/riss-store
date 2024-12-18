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
        Schema::create('customer_status_histories', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID for the primary key
            $table->uuid('customerId'); // UUID for the foreign key
            $table->string('status', 255); // Customer status
            $table->timestamp('changedAt')->nullable(); // Status change timestamp
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign key constraint
            $table->foreign('customerId')->references('id')->on('customers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_status_histories');
    }
};

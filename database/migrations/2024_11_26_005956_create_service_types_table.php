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
        Schema::create('service_types', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID for the primary key
            $table->string('name'); // The name of the service type (e.g., Dedicated, Broadband, Voucher)
            $table->string('code'); // A short code for the service type (e.g., DC, BD, VC)
            $table->string('availability'); // Availability status (e.g., Tersedia, Tidak ada)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_types');
    }
};

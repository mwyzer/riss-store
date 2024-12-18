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
        Schema::create('otps', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID as the primary key
            
            $table->uuid('user_id'); // Foreign key for the user
            $table->string('otp', 6); // OTP code, typically 6 digits
            $table->timestamp('expires_at'); // OTP expiration time
            $table->timestamps(); // Created at and updated at timestamps

            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};

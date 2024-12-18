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
        Schema::create('cities', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Use UUID for the primary key
            $table->uuid('province_id'); // Use UUID for the foreign key
            $table->string('name');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('province_id')->references('id')->on('provinces')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

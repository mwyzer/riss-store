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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('province_id');
            $table->foreignId('city_id');
            $table->string('invoice');
            $table->string('courier_name');
            $table->string('courier_service');
            $table->string('courier_cost');
            $table->integer('weight');
            $table->text('address');
            $table->bigInteger('grand_total');
            $table->string('reference')->nullable();
            $table->enum('status', ['UNPAID', 'PAID', 'EXPIRED', 'CANCELLED'])->default('UNPAID');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('province_id')->references('id')->on('provinces')->cascadeOnDelete();
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

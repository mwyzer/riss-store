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
        Schema::create('ktp_data_access_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_type_id')->constrained('partner_types')->onDelete('cascade');
            $table->foreignId('ktp_data_category_id')->constrained('ktp_data_categories')->onDelete('cascade');
            $table->foreignId('access_level_id')->constrained('access_levels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ktp_data_access_permissions');
    }
};

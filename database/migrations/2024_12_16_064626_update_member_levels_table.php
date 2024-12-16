<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMemberLevelsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the column already exists before adding it
        if (!Schema::hasColumn('member_levels', 'name')) {
            Schema::table('member_levels', function (Blueprint $table) {
                $table->string('name')->unique(); // Add the 'name' column
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_levels', function (Blueprint $table) {
            $table->dropColumn('name'); // Drop the 'name' column if rolling back
        });
    }
}

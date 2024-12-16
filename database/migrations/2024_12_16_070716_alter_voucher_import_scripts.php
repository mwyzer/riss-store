<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLimitBytesTotalToVoucherImportScriptsTableV3 extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('voucher_import_scripts', function (Blueprint $table) {
            $table->bigInteger('limit_bytes_total'); // Add the column if it doesn't exist
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voucher_import_scripts', function (Blueprint $table) {
            $table->dropColumn('limit_bytes_total'); // Remove the column if rolling back
        });
    }
}

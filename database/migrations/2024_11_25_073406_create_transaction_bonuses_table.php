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
        Schema::create('transaction_bonuses', function (Blueprint $table) {
            $table->id(); // Auto-incrementing integer primary key
            
            $table->unsignedBigInteger('levelId'); // Foreign key as integer
            $table->foreign('levelId') // Define the foreign key
                ->references('id')
                ->on('membership_levels') // Reference the `membership_levels` table
                ->onDelete('cascade'); // Cascade on delete

            $table->boolean('bonusEnabled')->default(true); // Indicates if the bonus is enabled
            $table->integer('bonusPoints'); // Bonus points for the transaction
            $table->integer('nominalTransaction'); // Minimum transaction amount to earn the bonus
            $table->string('berlakuTiap', 255)->nullable(); // Period for the bonus (e.g., daily, monthly)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_bonuses');
    }
};

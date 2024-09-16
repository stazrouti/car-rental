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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Model');
            $table->string('Year');
            $table->string('Doors');
            $table->string('AC');
            $table->string('Transmission');
            $table->string('Fuel');
            // Changing Price_per_day to store as an integer (in cents)
            $table->integer('Price_per_day'); 
            $table->string('Status');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

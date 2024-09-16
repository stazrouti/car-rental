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
            $table->string('Name');             // Car make, e.g., Toyota
            $table->string('Model');            // Car model, e.g., Corolla
            $table->string('Year');             // Year of manufacture
            $table->string('Doors');            // Number of doors
            $table->string('AC');               // Air conditioning (Yes/No)
            $table->string('Transmission');     // Transmission type (Manual/Automatic)
            $table->string('Fuel');             // Fuel type (Petrol/Diesel)
            $table->decimal('Price_per_day', 8, 2); // Rental price per day
            $table->string('Status');           // Car status (Available, Rented, Maintenance)
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

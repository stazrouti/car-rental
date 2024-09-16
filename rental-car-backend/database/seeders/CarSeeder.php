<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        // Create a Faker instance
        $faker = Faker::create();

        // Seed 20 cars with random data
        for ($i = 0; $i < 20; $i++) {
            Car::create([
                'Name' => $faker->company, // Random car make, e.g., Toyota, Ford
                'Model' => $faker->word, // Random car model, e.g., Corolla, Focus
                'Year' => $faker->year, // Random year of manufacture
                'Doors' => $faker->randomElement([2, 4]), // Random number of doors (2 or 4)
                'AC' => $faker->randomElement(['Yes', 'No']), // Random AC availability
                'Transmission' => $faker->randomElement(['Manual', 'Automatic']), // Random transmission type
                'Fuel' => $faker->randomElement(['Petrol', 'Diesel', 'Electric']), // Random fuel type
                'Price_per_day' => $faker->randomFloat(2, 50, 300), // Random rental price per day (50 to 300)
                'Status' => $faker->randomElement(['Available', 'Rented', 'Maintenance']), // Random status
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

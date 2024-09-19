<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\Car;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        // Create a Faker instance
        $faker = Faker::create();
        // Seed 20 cars with random data
        for ($i = 0; $i < 20; $i++) {
            // Generate a valid pickup and dropoff date
            $pickupDate = $faker->date();
            $dropoffDate = $faker->dateTimeBetween($pickupDate, '+1 week'); // Ensure dropoff is after pickup

            // Get a random Car ID
            $carId = Car::inRandomOrder()->first()->id;

            Reservation::create([
                'pickup_date' => $pickupDate,
                'dropoff_date' => $dropoffDate,
                'pickup_location' => $faker->city,
                'dropoff_location' => $faker->city,
                'car_id' => $carId,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

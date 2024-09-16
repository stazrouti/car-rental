<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarImage;
use Faker\Factory as Faker;

class CarImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cars = Car::all(); // Fetch all cars from the cars table

        // Loop through each car and assign random images
        foreach ($cars as $car) {
            // Each car will have between 1 to 5 images
            for ($i = 0; $i < rand(1, 5); $i++) {
                CarImage::create([
                    'car_id' => $car->id,  // Associate the image with the car
                    'image_path' => $faker->imageUrl(640, 480, 'cars'), // Generate random car image
                ]);
            }
        }
    }
}

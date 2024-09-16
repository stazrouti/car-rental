<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('cars')->insert([
                'Name' => $faker->company,
                'Model' => $faker->word,
                'Year' => $faker->year,
                'Doors' => $faker->numberBetween(2, 5),
                'AC' => $faker->boolean ? 'Yes' : 'No',
                'Transmission' => $faker->randomElement(['Manual', 'Automatic']),
                'Fuel' => $faker->randomElement(['Petrol', 'Diesel', 'Electric']),
                'Price_per_day' => $faker->randomFloat(2, 10, 200),
                'Status' => $faker->randomElement(['Available', 'Rented', 'Maintenance']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name', 'Model', 'Year', 'Doors', 'AC', 'Transmission', 'Fuel', 'Price_per_day', 'Status'
    ];

    // A car can have many images
    public function images()
    {
        return $this->hasMany(CarImage::class, 'car_id'); // Assuming 'car_id' is the foreign key in CarImage table
    }
    
}

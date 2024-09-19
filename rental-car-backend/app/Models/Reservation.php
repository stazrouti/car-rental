<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_date',
        'dropoff_date',
        'pickup_location',
        'dropoff_location',
        'car_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
    ];

    // Define the relationship with the Car model if applicable
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

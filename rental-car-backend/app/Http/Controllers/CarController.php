<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('images')->get();  // Fetch cars along with images
        return response()->json($cars);
    }
    
    public function store(Request $request)
    {
        // Validate the car details and image uploads
        $request->validate([
            'Name' => 'required|string|max:255',
            'Model' => 'required|string|max:255',
            'Year' => 'required|string|max:4',
            'Doors' => 'required|string',
            'AC' => 'required|string',
            'Transmission' => 'required|string',
            'Fuel' => 'required|string',
            'Price_per_day' => 'required|numeric',
            'Status' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Multiple images
        ]);
    
        DB::beginTransaction();
        try {
            // Create the car
            $car = Car::create([
                'Name' => $request->Name,
                'Model' => $request->Model,
                'Year' => $request->Year,
                'Doors' => $request->Doors,
                'AC' => $request->AC,
                'Transmission' => $request->Transmission,
                'Fuel' => $request->Fuel,
                'Price_per_day' => $request->Price_per_day,
                'Status' => $request->Status,
            ]);
    
            // Handle image uploads
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('cars', 'public');
    
                    // Save the image record in car_images table
                    CarImage::create([
                        'car_id' => $car->id,
                        'image_path' => $imagePath,
                    ]);
                }
            }
    
            DB::commit();
            return response()->json($car->load('images'), 201);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while saving the car data'], 500);
        }
    }
    public function show($id)
    {
        // Find the car by ID along with its images using Eager Loading
        $car = Car::with('images')->find($id);
    
        // If the car doesn't exist, return a 404 error
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
    
        // Return the car details and associated images as JSON
        return response()->json($car);
    }
    
    public function update(Request $request, $id)
    {
        // Find the car by ID
        $car = Car::find($id);

        // If the car doesn't exist, return a 404 error
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        // Validate the request data
        $request->validate([
            'Name' => 'string|max:255',
            'Model' => 'string|max:255',
            'Year' => 'string|max:4',
            'Doors' => 'string',
            'AC' => 'string',
            'Transmission' => 'string',
            'Fuel' => 'string',
            'Price_per_day' => 'numeric',
            'Status' => 'string',
        ]);

        // Update the car with the new data
        $car->update($request->all());

        // Return the updated car as JSON
        return response()->json($car);
    }

    public function destroy($id)
    {
        // Find the car by ID
        $car = Car::find($id);

        // If the car doesn't exist, return a 404 error
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        // Delete the car
        $car->delete();

        // Return a success message
        return response()->json(['message' => 'Car deleted successfully']);
    }



}

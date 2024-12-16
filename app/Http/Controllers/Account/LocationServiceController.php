<?php

namespace App\Http\Controllers;

use App\Models\LocationService;
use Illuminate\Http\Request;

class LocationServiceController extends Controller
{
    /**
     * Display a listing of location services.
     */
    public function index()
    {
        $services = LocationService::all(); // Fetch all location services
        return response()->json($services);
    }

    /**
     * Store a newly created location service.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'location_id' => 'required|integer',
            'service_type_id' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        // Create a new LocationService record
        $service = LocationService::create($validated);

        return response()->json($service, 201); // Return the created record with status 201
    }

    /**
     * Display the specified location service.
     */
    public function show($id)
    {
        $service = LocationService::find($id);

        if (!$service) {
            return response()->json(['message' => 'Location Service not found'], 404);
        }

        return response()->json($service);
    }

    /**
     * Update the specified location service in the database.
     */
    public function update(Request $request, $id)
    {
        $service = LocationService::find($id);

        if (!$service) {
            return response()->json(['message' => 'Location Service not found'], 404);
        }

        // Validate the request data
        $validated = $request->validate([
            'location_id' => 'required|integer',
            'service_type_id' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        // Update the record
        $service->update($validated);

        return response()->json($service);
    }

    /**
     * Remove the specified location service from the database.
     */
    public function destroy($id)
    {
        $service = LocationService::find($id);

        if (!$service) {
            return response()->json(['message' => 'Location Service not found'], 404);
        }

        $service->delete();

        return response()->json(['message' => 'Location Service deleted']);
    }
}

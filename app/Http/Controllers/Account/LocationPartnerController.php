<?php

namespace App\Http\Controllers;

use App\Models\LocationPartner;
use Illuminate\Http\Request;

class LocationPartnerController extends Controller
{
    /**
     * Display a listing of location partners.
     */
    public function index()
    {
        $partners = LocationPartner::all(); // Fetch all location partners
        return response()->json($partners);
    }

    /**
     * Store a newly created location partner in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'locationId' => 'required|integer',
            'partnerTypeId' => 'required|integer',
            'status' => 'required|string',
            'maxCount' => 'required|integer',
            'filledCount' => 'integer',
        ]);

        // Create a new LocationPartner record
        $partner = LocationPartner::create($validated);

        return response()->json($partner, 201); // Return the created record with status 201
    }

    /**
     * Display the specified location partner.
     */
    public function show($id)
    {
        $partner = LocationPartner::find($id);

        if (!$partner) {
            return response()->json(['message' => 'Location Partner not found'], 404);
        }

        return response()->json($partner);
    }

    /**
     * Update the specified location partner in the database.
     */
    public function update(Request $request, $id)
    {
        $partner = LocationPartner::find($id);

        if (!$partner) {
            return response()->json(['message' => 'Location Partner not found'], 404);
        }

        // Validate the request data
        $validated = $request->validate([
            'locationId' => 'required|integer',
            'partnerTypeId' => 'required|integer',
            'status' => 'required|string',
            'maxCount' => 'required|integer',
            'filledCount' => 'integer',
        ]);

        // Update the record
        $partner->update($validated);

        return response()->json($partner);
    }

    /**
     * Remove the specified location partner from the database.
     */
    public function destroy($id)
    {
        $partner = LocationPartner::find($id);

        if (!$partner) {
            return response()->json(['message' => 'Location Partner not found'], 404);
        }

        $partner->delete();

        return response()->json(['message' => 'Location Partner deleted']);
    }
}

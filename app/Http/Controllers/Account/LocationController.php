<?php

namespace App\Http\Controllers\Account;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the locations.
     */
    public function index()
    {
        $locations = Location::latest()->paginate(10);
        return inertia('Account/Locations/Index', [
            'locations' => $locations
        ]);
    }

    /**
     * Show the form for creating a new location.
     */
    public function create()
    {
        return inertia('Account/Locations/Create');
    }

    /**
     * Store a newly created location.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'balance' => 'required|numeric'
        ]);

        Location::create([
            'name' => $request->name,
            'address' => $request->address,
            'balance' => $request->balance
        ]);

        return redirect()->route('account.locations.index')
            ->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified location.
     */
    public function show(Location $location)
    {
        return inertia('Account/Locations/Show', [
            'location' => $location->load([
                'locationDetails',
                'locationServices',
                'locationIsp',
                'locationPartners',
                'stocks',
                'complaintHistory',
                'dailySales',
                'monthlySales',
                'salesHistory',
                'postpaidProviders',
                'prepaidProviders',
                'metroProviders',
                'satelliteProviders'
            ])
        ]);
    }

    /**
     * Show the form for editing the specified location.
     */
    public function edit(Location $location)
    {
        return inertia('Account/Locations/Edit', [
            'location' => $location
        ]);
    }

    /**
     * Update the specified location.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'balance' => 'required|numeric'
        ]);

        $location->update([
            'name' => $request->name,
            'address' => $request->address,
            'balance' => $request->balance
        ]);

        return redirect()->route('account.locations.index')
            ->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified location.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('account.locations.index')
            ->with('success', 'Location deleted successfully.');
    }
}

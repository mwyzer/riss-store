<?php

namespace App\Http\Controllers;

use App\Models\PrepaidProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PrepaidProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prepaids = PrepaidProvider::with('location')->get();

        // Return the view via Inertia
        return Inertia::render('Account/Prepaids/Index', [
            'prepaids' => $prepaids,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a Blade view for creating a prepaid provider
        return Inertia::render('Account/Prepaids/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:prepaid_providers,number',
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'holder' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive',
            'limit' => 'nullable|numeric|min:0',
        ]);
    
        PrepaidProvider::create($validated);
    
        // Return the updated list of providers with a success message
        return Inertia::render('PrepaidProviders/Index', [
            'success' => 'Prepaid provider created successfully.',
            'prepaidProviders' => PrepaidProvider::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PrepaidProvider $prepaidProvider)
    {
        // Return the prepaid provider as JSON or integrate with Inertia
        return Inertia::render('Account/Prepaids/Show', [
            'prepaidProvider' => $prepaidProvider,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrepaidProvider $prepaidProvider)
    {
        // Return a Blade view for editing a prepaid provider
        return Inertia::render('Account/Prepaids/Create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrepaidProvider $prepaidProvider)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:prepaid_providers,number,' . $prepaidProvider->id,
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'holder' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive',
            'limit' => 'nullable|numeric|min:0',
        ]);

        $prepaidProvider->update($validated);

        return redirect()->route('prepaid_providers.index')
            ->with('success', 'Prepaid provider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrepaidProvider $prepaidProvider)
    {
        $prepaidProvider->delete();

        return redirect()->route('prepaid_providers.index')
            ->with('success', 'Prepaid provider deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MetroProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MetroProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metroProviders = MetroProvider::all();

        return Inertia::render('MetroProviders/Index', [
            'metroProviders' => $metroProviders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('MetroProviders/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:metro_providers,number',
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'holder' => 'required|string|max:255',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
        ]);
    
        MetroProvider::create($validated);
    
        return redirect()->route('metro_providers.index')
            ->with('success', 'Metro provider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MetroProvider $metroProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetroProvider $metroProvider)
    {
        return Inertia::render('MetroProviders/Edit', [
            'metroProvider' => $metroProvider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetroProvider $metroProvider)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:metro_providers,number,' . $metroProvider->id,
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'holder' => 'required|string|max:255',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
        ]);
    
        $metroProvider->update($validated);
    
        return redirect()->route('metro_providers.index')
            ->with('success', 'Metro provider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetroProvider $metroProvider)
    {
        $metroProvider->delete();

        return redirect()->route('metro_providers.index')
            ->with('success', 'Metro provider deleted successfully.');
    }
}

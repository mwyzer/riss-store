<?php

namespace App\Http\Controllers;

use App\Models\AccessLevel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccessLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessLevels = AccessLevel::all();

        return Inertia::render('AccessLevels/Index', [
            'accessLevels' => $accessLevels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('AccessLevels/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:access_levels,name',
        ]);

        AccessLevel::create($request->all());

        return redirect()->route('access_levels.index')->with('success', 'Access level created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessLevel $accessLevel)
    {
        return Inertia::render('AccessLevels/Edit', [
            'accessLevel' => $accessLevel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccessLevel $accessLevel)
    {
        $request->validate([
            'name' => 'required|unique:access_levels,name,' . $accessLevel->id,
        ]);

        $accessLevel->update($request->all());

        return redirect()->route('access_levels.index')->with('success', 'Access level updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessLevel $accessLevel)
    {
        $accessLevel->delete();

        return redirect()->route('access_levels.index')->with('success', 'Access level deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Account;

use App\Models\Postpaid;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;


class PostpaidProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postpaids = Postpaid::with('location')->get();

        // Return the view via Inertia
        return Inertia::render('Account/Postpaids/Index', [
            'postpaids' => $postpaids,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a postpaid
        return Inertia::render('Account/Postpaids/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|unique:postpaids',
            'provider' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'position' => 'required|string',
            'holder' => 'required|string',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
            'limit' => 'required|numeric|min:0',
        ]);

        Postpaid::create($validated);

        // Redirect back to the index page with a success message
        return redirect()->route('postpaids.index')->with('success', 'Postpaid number created successfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show(Postpaid $postpaid)
    {
        $postpaid->load('location');

        // Return the view via Inertia
        return Inertia::render('Account/Postpaids/Show', [
            'postpaid' => $postpaid,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postpaid $postpaid)
    {
        // Return the edit form view via Inertia
        return Inertia::render('Account/Postpaids/Edit', [
            'postpaid' => $postpaid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postpaid $postpaid)
    {
        $validated = $request->validate([
            'number' => 'required|unique:postpaids,number,' . $postpaid->id,
            'provider' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'position' => 'required|string',
            'holder' => 'required|string',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
            'limit' => 'required|numeric|min:0',
        ]);

        $postpaid->update($validated);

        // Redirect back to the index page with a success message
        return redirect()->route('postpaids.index')->with('success', 'Postpaid number updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postpaid $postpaid)
    {
        $postpaid->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('postpaids.index')->with('success', 'Postpaid number deleted successfully!');
    }
}

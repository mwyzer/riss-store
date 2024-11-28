<?php

namespace App\Http\Controllers\Account;

use App\Models\PostpaidProvider;
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
        $postpaids = PostpaidProvider::with('location')->get();

        // Return the view via Inertia with paginated results if needed
        return Inertia::render('Account/Postpaids/Index', [
            'postpaids' => $postpaids,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a postpaid number via Inertia
        return Inertia::render('Account/Postpaids/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:postpaid_providers,number',
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'holder' => 'required|string|max:255',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
            'limit' => 'nullable|numeric|min:0',
        ]);
    
        PostpaidProvider::create($validated);
    
       // Return a success response via Inertia
        return Inertia::render('Account/Postpaids/Index', [
            'success' => 'Postpaid provider created successfully.',
            'postpaidProviders' => PostpaidProvider::all(),
        ]);
    }
        /**
     * Show the specified resource.
     */
    public function show(PostpaidProvider $postpaid)
    {
        $postpaid->load('location');

        // Return the show view via Inertia
        return Inertia::render('Account/Postpaids/Show', [
            'postpaid' => $postpaid,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostpaidProvider $postpaid)
    {
        // Return the edit form view via Inertia
        return Inertia::render('Account/Postpaids/Edit', [
            'postpaid' => $postpaid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, PostpaidProvider $postpaid)
    {
        $validated = $request->validate([
            'number' => 'required|string|unique:postpaid_providers,number,' . $postpaid->id,
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'holder' => 'required|string|max:255',
            'status' => 'required|in:Terpasang,Stand By,Bermasalah',
            'limit' => 'nullable|numeric|min:0',
        ]);

        $postpaid->update($validated);

        // Return the updated list with a success message
        return Inertia::render('Account/Postpaids/Index', [
            'success' => 'Postpaid number updated successfully!',
            'postpaids' => PostpaidProvider::all(),
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostpaidProvider $postpaid)
    {
        $postpaid->delete();
    
        // Return the updated list with a success message
        return Inertia::render('Account/Postpaids/Index', [
            'success' => 'Postpaid number deleted successfully!',
            'postpaids' => PostpaidProvider::all(), // Updated list of postpaid providers
        ]);
    }
}

<?php

namespace App\Http\Controllers\Account;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch colors with optional search query and eager loading (if relationships exist)
        $colors = Color::when(request()->q, function ($query) {
                $query->where('name', 'like', '%' . request()->q . '%');
            })
            ->latest()
            ->paginate(5);

        // Append query string to pagination links
        $colors->appends(['q' => request()->q]);

        // Render with Inertia
        return inertia('Account/Colors/Index', [
            'colors' => $colors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Render create form with Inertia
        return inertia('Account/Colors/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'name'  => 'required|string|unique:colors,name',
            'image' => 'nullable|mimes:png,jpg|max:2048',
        ], [
            'name.required' => 'The color name is required.',
            'name.unique'   => 'The color name must be unique.',
            'image.mimes'   => 'The image must be a file of type: png, jpg.',
        ]);

        // Upload image if provided
        $image = null;
        if ($request->file('image')) {
            $image = $request->file('image')->storeAs('public/colors', $request->file('image')->hashName());
        }

        // Create new color
        Color::create([
            'name'  => $validated['name'],
            'image' => $image ? basename($image) : null,
        ]);

        // Redirect with success message
        return redirect()->route('account.colors.index')->with('success', 'Color created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get color by ID
        $color = Color::findOrFail($id);

        // Render edit form with Inertia
        return inertia('Account/Colors/Edit', [
            'color' => $color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Color $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        // Validate request
        $validated = $request->validate([
            'name'  => 'required|string|unique:colors,name,' . $color->id,
            'image' => 'nullable|mimes:png,jpg|max:2048',
        ]);

        // Handle image update
        if ($request->file('image')) {
            // Delete old image if it exists
            if ($color->image) {
                Storage::disk('local')->delete('public/colors/' . $color->image);
            }

            // Upload new image
            $image = $request->file('image')->storeAs('public/colors', $request->file('image')->hashName());
            $color->update([
                'image' => basename($image),
            ]);
        }

        // Update color name
        $color->update([
            'name' => $validated['name'],
        ]);

        // Redirect with success message
        return redirect()->route('account.colors.index')->with('success', 'Color updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find color by ID
        $color = Color::findOrFail($id);

        // Delete image from storage if it exists
        if ($color->image) {
            Storage::disk('local')->delete('public/colors/' . $color->image);
        }

        // Delete color record
        $color->delete();

        // Redirect with success message
        return redirect()->route('account.colors.index')->with('success', 'Color deleted successfully.');
    }
}

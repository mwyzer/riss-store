<?php

namespace App\Http\Controllers;

use App\Models\LevelMember;
use Illuminate\Http\Request;

class LevelMemberController extends Controller
{
    /**
     * Display a listing of level members.
     */
    public function index(Request $request)
    {
        $levels = LevelMember::all();

        return response()->json($levels);
    }

    /**
     * Store a newly created level member in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'point_multiplier' => 'required|integer|min:1',
            'bonus_points' => 'required|integer|min:0',
            'minimum_spending' => 'required|numeric|min:0',
            'maximum_spending' => 'nullable|numeric|min:0',
            'requirements' => 'nullable|array',
        ]);

        $level = LevelMember::create([
            ...$validatedData,
            'requirements' => json_encode($validatedData['requirements'] ?? [])
        ]);

        return response()->json($level, 201);
    }

    /**
     * Update the specified level member.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'point_multiplier' => 'sometimes|integer|min:1',
            'bonus_points' => 'sometimes|integer|min:0',
            'minimum_spending' => 'sometimes|numeric|min:0',
            'maximum_spending' => 'nullable|numeric|min:0',
            'requirements' => 'nullable|array',
        ]);

        $level = LevelMember::findOrFail($id);
        $level->update([
            ...$validatedData,
            'requirements' => json_encode($validatedData['requirements'] ?? [])
        ]);

        return response()->json($level);
    }

    /**
     * Remove the specified level member from storage.
     */
    public function destroy($id)
    {
        $level = LevelMember::findOrFail($id);
        $level->delete();

        return response()->json(['message' => 'Level member deleted successfully']);
    }
}

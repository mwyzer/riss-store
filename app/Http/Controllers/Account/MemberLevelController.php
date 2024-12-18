<?php

namespace App\Http\Controllers;

use App\Models\MemberLevel;
use Illuminate\Http\Request;

class MemberLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberLevels = MemberLevel::all();
        return response()->json($memberLevels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:member_levels,name|max:255',
        ]);

        $memberLevel = MemberLevel::create($request->only('name'));

        return response()->json($memberLevel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberLevel $memberLevel)
    {
        return response()->json($memberLevel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberLevel $memberLevel)
    {
        $request->validate([
            'name' => 'required|unique:member_levels,name,' . $memberLevel->id . '|max:255',
        ]);

        $memberLevel->update($request->only('name'));

        return response()->json($memberLevel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberLevel $memberLevel)
    {
        $memberLevel->delete();

        return response()->json(['message' => 'Member Level deleted successfully']);
    }
}
